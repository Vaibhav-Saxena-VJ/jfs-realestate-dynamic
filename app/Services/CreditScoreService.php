<?php

namespace App\Services;
use Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;


class CreditScoreService
{
    protected $baseUrl = 'https://production.deepvue.tech/v1';
    protected $clientId = 'free_tier_deepak_be05fff3ff';
    protected $clientSecret = '363398949c12451d8dcb0a991e542b8c';
    protected $apiKey = '363398949c12451d8dcb0a991e542b8c';


public function getCreditScore()
    {
        try {
            // Step 1: Get the bearer token
            $token = $this->getBearerToken();
            //dd($token);
            if (!$token) {
                throw new Exception('Bearer token not found');
            }
            
            // Step 2: Fetch user information based on session user ID
            $userId = Session::get('user_id');
            //dd($userId);
            $userInfo = DB::table('users')
                ->join('loans', 'loans.user_id', '=', 'users.id')
                ->join('profile', 'users.id', '=', 'profile.user_id')
                ->where('users.id', $userId)
                ->select(
                    'profile.mobile_no',
                    'users.name',
                    'users.pan_no',
                    'loans.remarks'
                )
                ->first();
             //dd($userInfo);
            // Check if user info was fetched correctly
            if (!$userInfo) {
                throw new Exception('User information not found');
            }
            
            //Step 3: Make the API request to fetch credit score  

            // Dynamic values
            $fullName = urlencode($userInfo->name);
            $panNumber = urlencode($userInfo->pan_no);
            $mobileNumber = urlencode($userInfo->mobile_no);
            $purpose = urlencode('For Loan Eligibility Check');
            $consent = 'Y';
            $apiKey = '363398949c12451d8dcb0a991e542b8c';
            //dd($fullName,$panNumber,$mobileNumber,$purpose,$consent,$apiKey);
            // Construct the URL with dynamic parameters
            // $url = "https://production.deepvue.tech/v1/financial-services/credit-bureau/credit-report"
            //     . "?full_name={$fullName}"
            //     . "&pan_number={$panNumber}"
            //     . "&mobile_number={$mobileNumber}"
            //     . "&purpose={$purpose}"
            //     . "&consent={$consent}";
            // //dd($url);
            // // Initialize cURL
            // $curl = curl_init();

            // curl_setopt_array($curl, [
            //     CURLOPT_URL => $url,
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => '',
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 0,
            //     CURLOPT_FOLLOWLOCATION => true,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => 'GET',
            //     CURLOPT_HTTPHEADER => [
            //         'x-api-key: ' . $apiKey,
            //         'Authorization: Bearer ' . $token, // Include token if needed
            //         'Content-Type: application/json'
            //     ],
            // ]);

            // // Execute the request
            // $response = curl_exec($curl);
            // //dd($response);
            // Log::info($response);
            // // Check for errors
            // if (curl_errno($curl)) {
            //     echo 'cURL Error: ' . curl_error($curl);
            // }

            // // Close the cURL session
            // curl_close($curl);

            // // Output the response
            // // echo $response;

            
            // // Handle response
            // if ($response === false) {
            //     die("Empty response from server.");
            // }
            
           
            
            // Debug the response
            // if (json_last_error() !== JSON_ERROR_NONE) {
            //     die("JSON Decode Error: " . json_last_error_msg());
            // }
            // Log::info($response);
            // print_r($response);
            
                // Decode the response
                // $responseData = json_decode($response, true);

            //Log::info($response);
            // $response = '{
            //     "code": 200,                               manual json
            //     "timestamp": 1731090521035,
            //     "transaction_id": "e66b264be23949b4be369746b08869d5",
            //     "sub_code": "SUCCESS",
            //     "message": "Credit report fetched successfully.",
            //     "data": {
            //         "pan": "ABCDE1234F",
            //         "mobile": "9876543210",
            //         "name": "Rahul Sharma",
            //         "credit_score": "700",
            //         "credit_report": {}
            //     }
            // }';
            // dd($response);
            // Step 4: Check if the response is successful
            // if ($response->failed() || $response->status() !== 200) {
            //     throw new Exception('Failed to fetch: ' . $response->status() . ' - ' . $response->body());
            // }

            // Step 5: Parse the response
            //$creditScoreData = $response;   // fpr automatic
            // dd( $creditScoreData);
            // $creditScoreData = $response;                 for manual
            //Log::info($creditScoreData);
            // Step 6: Store the response in the database
            $this->storeCreditScore($userId,$response);

            // Step 7: Share the credit score with another function
            // $this->processCreditScore($creditScoreData);

            // Return the response for further use if needed
            //dd($response);
            //return $creditScoreData = $response;            //for manual
            //$responseData = json_decode($response, true);
            return $response;                          //for live APi
            // return [
                
            //     'data' => $creditScoreData
            // ];

        } catch (Exception $e) {
            // Handle exceptions and errors
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    public function getBearerToken()
    {
        try {
            $response = Http::asForm()->post("{$this->baseUrl}/authorize", [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
            ]);

            if ($response->failed()) {
                throw new Exception('Failed to fetch bearer token: ' . $response->body());
            }

            $data = $response->json();
            return $data['access_token'] ?? null;
        } catch (Exception $e) {
            throw new Exception("Error while getting token: " . $e->getMessage());
        }
    }

    protected function storeCreditScore($userId, $creditScoreData)
    {
       //dd( $creditScoreData);
        // $json = trim($json); // Remove leading/trailing whitespace
        // $json = preg_replace('/[\x00-\x1F\x80-\x9F]/u', '', $json);
        $response = json_decode($creditScoreData, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            die('JSON decode error: ' . json_last_error_msg());
        }
        $credit_score = $response['data']['credit_score'] ?? null; // Using null coalescing operator to handle missing keys
        // dd( $credit_score);
        // Insert or update the credit score data in the database
        $res=DB::table('credit_scores')->updateOrInsert(
            ['user_id' => $userId],
            [
                'credit_score' =>$credit_score ?? null,
                'report_data' => json_encode($creditScoreData),
                'fetched_at' => now(),
            ]
        );
    }

}
