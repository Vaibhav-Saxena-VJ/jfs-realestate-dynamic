@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Loan Application Process</h1>
    <form action="{{ route('loan.handle_step') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="current_step" value="{{ $currentStep }}">

        <div id="step-form">
            @if ($currentStep == 1)
                <h2>Loan Category and Bank Selection</h2>
                <label for="loan_category_id">Loan Category:</label>
                <select name="loan_category_id" id="loan_category_id" required>
                    @foreach($loanCategories as $category)
                        <option value="{{ $category->loan_category_id }}" 
                            {{ session('loan_category_id') == $category->loan_category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                <label for="bank_name">Bank Name:</label>
                <input type="text" name="bank_name" id="bank_name" value="{{ session('bank_name') }}" required>

            @elseif ($currentStep == 2)
                <h2>Personal Details</h2>
                <label for="name">Full Name:</label>
                <input type="text" name="name" id="name" value="{{ session('name') }}" required>
                <label for="mobile_no">Mobile No:</label>
                <input type="text" name="mobile_no" id="mobile_no" value="{{ session('mobile_no') }}" required>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ session('email') }}" required>

            @elseif ($currentStep == 3)
                <h2>Education Details</h2>
                <label for="qualification">Qualification:</label>
                <input type="text" name="qualification" id="qualification" value="{{ session('qualification') }}" required>
                <label for="college_name">College Name:</label>
                <input type="text" name="college_name" id="college_name" value="{{ session('college_name') }}" required>
                <label for="passing_year">Passing Year:</label>
                <input type="text" name="passing_year" id="passing_year" value="{{ session('passing_year') }}" required>

            @elseif ($currentStep == 4)
                <h2>Professional Details</h2>
                <label for="company_name">Company Name:</label>
                <input type="text" name="company_name" id="company_name" value="{{ session('company_name') }}" required>
                <label for="designation">Designation:</label>
                <input type="text" name="designation" id="designation" value="{{ session('designation') }}" required>
                <label for="salary">Net Salary:</label>
                <input type="text" name="salary" id="salary" value="{{ session('salary') }}" required>
                <label for="experience_year">Years of Experience:</label>
                <input type="text" name="experience_year" id="experience_year" value="{{ session('experience_year') }}" required>

            @elseif ($currentStep == 5)
                <h2>Existing Loan Details</h2>
                <div id="existing-loans">
                    @if(session('existing_loans'))
                        @foreach(session('existing_loans') as $loan)
                            <div>
                                <label for="existing_loan_amount">Existing Loan Amount:</label>
                                <input type="text" name="existing_loan_amount[]" value="{{ $loan['amount'] }}" required>
                                <label for="existing_loan_status">Status:</label>
                                <input type="text" name="existing_loan_status[]" value="{{ $loan['status'] }}" required>
                            </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" onclick="addExistingLoan()">Add Existing Loan</button>

            @elseif ($currentStep == 6)
                <h2>Document Upload</h2>
                <label for="documents">Upload Documents:</label>
                <input type="file" name="documents[]" multiple>

            @elseif ($currentStep == 7)
                <h2>Financial Information</h2>
                <label for="financial_info">Financial Info:</label>
                <input type="text" name="financial_info" id="financial_info" value="{{ session('financial_info') }}">

            @elseif ($currentStep == 8)
                <h2>Review and Submit</h2>
                <p>Please review your details before submitting:</p>
                <p><strong>Loan Amount:</strong> {{ session('amount') }}</p>
                <p><strong>Loan Category:</strong> {{ session('loan_category_id') }}</p>
                <p><strong>Full Name:</strong> {{ session('name') }}</p>
                <!-- Add other fields as necessary for review -->

            @endif
        </div>

        <button type="submit">Next</button>
    </form>
</div>

<script>
    function addExistingLoan() {
        const existingLoansDiv = document.getElementById('existing-loans');
        const newLoanDiv = document.createElement('div');
        newLoanDiv.innerHTML = `
            <label for="existing_loan_amount">Existing Loan Amount:</label>
            <input type="text" name="existing_loan_amount[]" required>
            <label for="existing_loan_status">Status:</label>
            <input type="text" name="existing_loan_status[]" required>
        `;
        existingLoansDiv.appendChild(newLoanDiv);
    }
</script>
@endsection
