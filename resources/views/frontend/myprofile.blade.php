@extends('frontend.layouts.header')

@section('title', 'My Profile')

@section('content')

<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center text-primary mb-4">{{ Session::get('username')}}</h5>
                        
                        <div class="list-group list-group-flush">
                            <a href="{{ route('loan.profile', ['section' => 'loans']) }}" class="list-group-item list-group-item-action {{ request('section') == 'loans' ? 'active' : '' }}">
                                <i class="fas fa-file-alt"></i> My Loans
                            </a>
                            <a href="{{ route('loan.profile', ['section' => 'personal']) }}" class="list-group-item list-group-item-action {{ request('section') == 'personal' ? 'active' : '' }}">
                                <i class="fas fa-user"></i> Personal Info
                            </a>
                            <a href="{{ route('loan.profile', ['section' => 'professional']) }}" class="list-group-item list-group-item-action {{ request('section') == 'professional' ? 'active' : '' }}">
                                <i class="fas fa-briefcase"></i> Professional Info
                            </a>
                            <a href="{{ route('loan.profile', ['section' => 'education']) }}" class="list-group-item list-group-item-action {{ request('section') == 'education' ? 'active' : '' }}">
                                <i class="fas fa-graduation-cap"></i> Education Info
                            </a>
                            <a href="{{ route('loan.profile', ['section' => 'document']) }}" class="list-group-item list-group-item-action {{ request('section') == 'document' ? 'active' : '' }}">
                                <i class="fas fa-file-alt"></i> Document Info
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if(request('section') == 'personal')
                            <h5 class="card-title">Personal Information</h5>
                            <hr>
                            @include('frontend.profile.personal-info')
                        @elseif(request('section') == 'professional')
                            <h5 class="card-title">Professional Information</h5>
                            <hr>
                            @include('frontend.profile.professional-info')
                        @elseif(request('section') == 'education')
                            <h5 class="card-title">Educational Information</h5>
                            <hr>
                            @include('frontend.profile.educational-info')
                        @elseif(request('section') == 'document')
                            <h5 class="card-title">Document Information</h5>
                            <hr>
                            @include('frontend.profile.document-info')
                        @elseif(request('section') == 'loans')
                            <h5 class="card-title">My Loan</h5>
                            <hr>
                            @include('frontend.profile.all-loans') 
                        @else
                            <h5 class="card-title">Welcome to Your Profile</h5>
                            <hr>
                            <p>Please select a section from the sidebar to view your profile details.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
