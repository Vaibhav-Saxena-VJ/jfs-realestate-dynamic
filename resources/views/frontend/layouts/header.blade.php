<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')" />
        <meta name="Keywords" content="@yield('keywords')">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="{{ asset('theme') }}/frontend/lib/animate/animate.min.css"/>
        <link href="{{ asset('theme') }}/frontend/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="{{ asset('theme') }}/frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('theme') }}/frontend/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('theme') }}/frontend/css/style.css" rel="stylesheet">


        <!-- Cutomized Scripts and CSS -->
        <script src="@yield('scripts')"></script>
        <script src="@yield('scripts2')"></script>
        <link rel="stylesheet" href="{{ asset('theme') }}/frontend/prop/@yield('links')"/>
        <link rel="stylesheet" href="{{ asset('theme') }}/frontend/prop/@yield('links2')"/>
        <link rel="stylesheet" type="text/css" href="@yield('link')"/>

        <link rel="icon" type="image/png" href="{{ asset('theme') }}/frontend/img/favicon.png">
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light"> 
                    <a href="{{ asset('') }}" class="navbar-brand p-0">
                        <img src="{{ asset('theme') }}/frontend/img/logo-g.png" alt="Logo" class="w-100">
                    </a>
                    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button> -->
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-0 mx-lg-auto">
                            <!-- <a href="{{ url('/') }}" class="nav-item {{ Request::is('/') ? 'active' : '' }}">HOME</a>
                            <a href="{{ url('about') }}" class="nav-item {{ Request::is('about') ? 'active' : '' }}">ABOUT</a> -->
                            <!-- <a href="{{ url('properties')}}" class="nav-item {{ Request::is('properties') ? 'active' : '' }}">PROPERTIES</a>
                            <a href="{{ url('referral-program')}}" class="nav-item {{ Request::is('referral-program') ? 'active' : '' }}">REFERRALS</a>
                            <a href="https://jfinserv.com/blog/" class="nav-item {{ Request::is('blog') ? 'active' : '' }}">BLOGS</a> -->
                            <!-- <div class="nav-btn px-3">
                                <a href="{{ url('contact')}}" class="btn btn-primary rounded-1 py-2 px-4 ms-3 flex-shrink-0 nav-item {{ Request::is('contact') ? 'active' : '' }}">CONTACT</a>
                            </div> -->

                            <!-- Social Icons
                            <div class="nav-btn d-flex">
                                <a class="btn btn-md-square rounded-circle me-3" href="https://www.linkedin.com/company/jfinserv-consultant-india-private-limited/"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-md-square rounded-circle me-3" href="https://www.facebook.com/profile.php?id=61563098494542"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-md-square rounded-circle me-3" href="https://twitter.com/jfinserv9668"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-md-square rounded-circle me-3" href="https://www.instagram.com/jfinserv_consultant/"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-md-square rounded-circle me-3" href="https://api.whatsapp.com/send?phone=917385551623&text=Hello,%20I%27m%20looking%20for"><i class="fab fa-whatsapp"></i></a>
                                <a class="btn btn-md-square rounded-circle me-0" href="tel:917385551623"><i class="fas fa-phone"></i></a>
                            </div> -->
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #000;">
                        <h5 class="modal-title text-gold" id="exampleModalLabel">ENQUIRE NOW</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body d-flex align-items-center" style="background-color: #000;">
                        <div class="input-group w-100 mx-auto d-flex">
                            <!-- <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i class="fa fa-search"></i></span> -->
                            <form action="{{ route('enquiry.store') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control border-0" id="name" name="name" value="{{ old('name') }}" placeholder="Your Name" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control border-0" id="contact" name="contact" value="{{ old('contact') }}" placeholder="Phone" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control border-0" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email" required>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control border-0" id="message" name="message" placeholder="Leave a message here" style="height: 80px" required>{{ old('message') }}</textarea>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-light w-50 py-2" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Login Modal Start -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0 pb-5">
                    <div class="modal-header">
                        <h4 class="modal-title" id="loginModal">LOGIN</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-100 mx-auto d-flex">
                            <div class="row text-center pt-3">
                                <div class="col-lg-6 border-end">
                                    <img src="{{ asset('theme') }}/frontend/img/loan.png" alt="Logo" class="w-50">
                                    <a class="btn-search btn btn-dark mt-3 px-md-5 ms-2" href="{{ url('/login') }}"> For Finance</a>
                                </div>
                                <div class="col-lg-6">
                                    <img src="{{ asset('theme') }}/frontend/img/housing.png" alt="Logo" class="w-50">
                                    <a class="btn-search btn btn-dark mt-3 px-md-5 ms-2" href="{{ url('/login') }}"> For Property</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- main content --}}
            <div class="main-content">
                @yield('content')
            </div>
        {{-- end main content --}}

        @include('frontend.layouts.footer') 

        <a href="#" class="whatsapp-icon" data-bs-toggle="modal" data-bs-target="#searchModal">
            <i class="fas fa-envelope-open-text fa-2x"></i>
        </a>
    </body>    
</html>