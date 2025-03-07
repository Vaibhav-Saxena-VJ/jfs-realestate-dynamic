protected function getCibilScore($fullName, $panNumber, $mobileNumber)
{
    $clientId = 'your_client_id';  // Replace with your actual client ID
    $clientSecret = 'your_client_secret';  // Replace with your actual client secret
    $url = "https://production.deepvue.tech/v1/financial-services/credit-bureau/credit-report";

    $params = [
        'full_name' => $fullName,
        'pan_number' => $panNumber,
        'mobile_number' => $mobileNumber,
        'consent' => 'Y',
        'purpose' => 'For Loan Eligibility Check'
    ];

    try {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url, [
            'headers' => [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
            ],
            'query' => $params
        ]);

        $data = json_decode($response->getBody(), true);

        // Extract credit score from response
        if (isset($data['credit_score'])) {
            return $data['credit_score'];
        }
        return null;

    } catch (\Exception $e) {
        Log::error('CIBIL API error: ' . $e->getMessage());
        return null;
    }
}
===
protected function handleLoanDetails(Request $request, $userId)
{
    $validated = $request->validate([
        'amount' => 'required|numeric',
        'tenure' => 'required|integer',
        'referral_code' => 'nullable|string|max:50', // Optional referral code
        'pan_number' => 'required|string|max:10', // Assume PAN is submitted in the form
        'mobile_no' => 'required|string|max:15', // Assume mobile no is submitted in the form
        'full_name' => 'required|string|max:255' // Assume full name is submitted in the form
    ]);

    // Call the CIBIL API to get the credit score
    $creditScore = $this->getCibilScore($validated['full_name'], $validated['pan_number'], $validated['mobile_no']);

    // Check the credit score and redirect based on the result
    if ($creditScore === null) {
        return redirect()->back()->withErrors('Unable to fetch credit score. Please try again.');
    } elseif ($creditScore < 700) {
        // Redirect to get back page if score is below 700
        return redirect()->route('loan.getback')->with('error', 'Your credit score is below 700. You are not eligible for the loan.');
    }

    // If credit score is 700 or above, proceed with loan submission
    $loanReferenceId = Str::upper(Str::random(8));

    // Initialize referral user ID as null
    $referralUserId = null;

    if (!empty($validated['referral_code'])) {
        // Find the user based on referral code
        $referralUser = DB::table('users')
            ->where('referral_code', $validated['referral_code'])
            ->first();

        if ($referralUser) {
            $referralUserId = $referralUser->id;
        }
    }

    // Perform update or insert into the loans table
    DB::table('loans')->updateOrInsert(
        ['user_id' => $userId],
        array_merge(
            Arr::only($validated, ['loan_category_id', 'amount', 'tenure']),
            ['loan_reference_id' => $loanReferenceId, 'referral_user_id' => $referralUserId]
        )
    );

    // Store loan reference ID in session
    session(['loan_reference_id' => $loanReferenceId]);

    // Get user details to send email
    $user = User::find($userId);
    if ($user) {
        $email = $user->email_id;
        $fullName = $user->name;
    }

    // Send email notification
    $msg = 'Your loan has been submitted successfully. Your loan reference ID is: ' . $loanReferenceId;
    $temp_id = 3; // Your Sendinblue template ID

    // Send the email
    app(UsersController::class)->temail($email, $fullName, $msg, $temp_id);

    // Notify the admin (optional)
    $admin = User::where('role_id', env('adminRole_id'))->first();
    if ($admin) {
        // Notification::send($admin, new LoanSubmittedNotification($loanReferenceId));
    }

    return redirect()->route('loan.thankyou');
}
===
Route::get('/loan-application', [LoanApplicationController::class, 'showForm'])->name('loan.form');
Route::post('/loan-application/step', [LoanApplicationController::class, 'handleStep'])->name('loan.handle_step');
Route::get('/thank-you', [LoanApplicationController::class, 'thankYou'])->name('loan.thankyou');
Route::get('/get-back', [LoanApplicationController::class, 'getBack'])->name('loan.getback');
===
public function getBack()
{
    return view('frontend.get-back'); // Create this Blade view to display rejection message
}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Loan Application Denied</h1>
    <p>Unfortunately, your credit score is below the required threshold. You are not eligible for the loan at this time.</p>
</div>
@endsection