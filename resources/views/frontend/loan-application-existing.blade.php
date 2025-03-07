@extends('frontend.layouts.header')

@section('title', 'Your Current Loan Status')

@section('content')
@if(isset($existingLoan))
    <h3>You have an existing loan</h3>
    <p>Loan ID: {{ $existingLoan->loan_reference_id }}</p>
    <p>Status: {{ $existingLoan->status }}</p>

    <a href="{{ route('loan.apply_new') }}" class="btn btn-primary">Apply for a New Loan</a>
@else
    <h3>Apply for a Loan</h3>
    @include('professional-info')
    {{-- Include other sections like personal info, educational info, document upload, etc. --}}
@endif

@endsection
