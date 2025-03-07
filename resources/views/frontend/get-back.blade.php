@extends('frontend.layouts.header')
@section('title', "Financial Services in Pune | Lowest Loan Interest in PCMC - Jfinserv")

@section('content')
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <div class="d-flex justify-content-center">
                    <div class="contact-img-inner">
                        <img src="{{ asset('theme/frontend/img/thank-you.png') }}" class="img-fluid w-50" alt="Loan Application Denied">
                    </div>
                </div>
                <h1 class="mt-4">Loan Application Denied</h1>
                <p class="text-danger font-weight-bold">Unfortunately, your credit score is below the required threshold. You are not eligible for the loan at this time.</p>
                <p>To improve your credit score, consider checking your credit report for errors, paying down existing debt, and making payments on time.</p>
                <p>If you have any questions or would like to discuss this further, feel free to <a>contact us</a>.</p>
                <div class="mt-4">
                    <a href="{{ route('loan.form') }}" class="btn btn-primary">Apply for Another Loan</a>
                    <a href="{{ route('loan.myloans') }}" class="btn btn-secondary">View My Loans</a>
                </div>
            </div>
        </div>
    </div>
@endsection