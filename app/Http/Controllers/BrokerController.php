<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Session;
use App\Models\Profile;
use App\Models\Professional;
use App\Models\Education;
use App\Models\LoanCategory;
use App\Models\ExistingLoan;
use App\Models\Document;
use App\Models\User;
use App\Models\Loan;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class BrokerController extends Controller
{
    public function allLoansApplications()
    {
        $user_id = Session::get('user_id');

        $data['loans'] = DB::table('loans')
        ->join('users', 'loans.user_id', '=', 'users.id')
        ->join('loan_category', 'loans.loan_category_id', '=', 'loan_category.loan_category_id')
        ->where('loans.is_broker', $user_id)
        ->select(
            'loans.loan_id',
            'loans.amount',
            'loans.tenure',
            'loans.loan_reference_id',
            'users.name as user_name',
            'loan_category.category_name as loan_category_name',
            'loans.agent_action'
        )
        ->paginate(10); // Adjust the pagination limit if necessary

    return view('broker.brokerAllLoans', compact('data'));
    
    }
   
    public function addLoan()
    {
        return view('broker.addLoanApplication');
    }

}