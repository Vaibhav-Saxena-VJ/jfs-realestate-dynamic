@extends('frontend.layouts.header')
@section('title', "Properties in Pune| Affordable property in PCMC - Jfinserv")
@section('description', "Looking for the Properties in Pune? Our Affordable property in PCMC  offers competitive offers to help you secure your dream home. Apply now.")
@section('keywords', "Properties in Pune, Affordable property in PCMC, Houses for sell in Pune, Buy house in Pune")

@section('scripts', "https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js")
@section('scripts2', "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js")


@section('content')
<!-- Header Start -->
<!-- <div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Find Your Dream Home</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active text-primary">Properties</li>
        </ol>    
    </div>
</div> -->

<!-- <div class="container-fluid bg-breadcrumb" style="background-image: url(../theme/frontend/img/prop-bnr.jpg);">
    <div class="container py-5">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Find Your Dream Home</h4>
    </div>
</div> -->

@php
    $banners = App\Models\Banner::latest()->get(); // Fetch latest 5 banners
@endphp

@if ($banners->count())
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($banners as $index => $banner)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="container-fluid bg-breadcrumb" style="background-image: url('{{ asset('storage/'.$banner->image) }}'); background-size: cover; background-position: center;">
                        <div class="container py-5">
                            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">
                                {{ $banner->title ?? 'Find Your Dream Home' }}
                            </h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Add Carousel Indicators -->
    <div class="carousel-indicators">
        @foreach ($banners as $index => $banner)
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="true"></button>
        @endforeach
    </div>
@endif


<div class="container-fluid prop-feature">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane shadow p-3 bg-white rounded fade show active" id="pills-flat" role="tabpanel" aria-labelledby="pills-home-tab">
                        <!-- Bootstrap Tabs -->
                        <ul class="nav nav-tabs border-0" id="propertyTabs">
                            <li class="nav-item">
                                <button class="nav-link active text-danger fw-bold" data-bs-toggle="tab" data-bs-target="#buyTab" data-tab="buy">Buy</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link text-muted" data-bs-toggle="tab" data-bs-target="#rentTab" data-tab="rent">Rent</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link text-muted" data-bs-toggle="tab" data-bs-target="#commercialTab" data-tab="commercial">Commercial</button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content p-3 border">
                            <!-- Buy Tab -->
                            <div class="tab-pane fade show active" id="buyTab">
                                <form id="buyForm">
                                    <div class="row align-items-center g-2">
                                        <!-- Location Dropdown -->
                                        <div class="col-md-3">
                                            <div class="dropdown">
                                                <button class="btn btn-light border w-100 text-start" type="button">
                                                    Pune
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Search Input -->
                                        <div class="col-md-6">
                                            <input type="text" class="form-control border" placeholder="Search up to 3 localities or landmarks">
                                        </div>

                                        <!-- Search Button -->
                                        <div class="col-md-3">
                                            <button id="searchButton" class="btn btn-danger w-100 py-2 rounded-1">
                                                <i class="bi bi-search"></i> Search
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Filters Row -->
                                    <div class="row align-items-center g-2 pt-3">
                                        <!-- Property Type -->
                                        <div class="col-md-4 d-flex">
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio" name="property_type_buy" id="full_house_buy" checked>
                                                <label class="form-check-label" for="full_house_buy">Full House</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="property_type_buy" id="land_plot_buy">
                                                <label class="form-check-label" for="land_plot_buy">Land/Plot</label>
                                            </div>
                                        </div>

                                        <!-- BHK Type -->
                                        <div class="col-md-3 bhk-status">
                                            <select class="form-select">
                                                <option>Select BHK</option>
                                                <option>1 BHK</option>
                                                <option>2 BHK</option>
                                                <option>3 BHK</option>
                                            </select>
                                        </div>

                                        <!-- Property Status -->
                                        <div class="col-md-3 bhk-status">
                                            <select class="form-select">
                                                <option>Property Status</option>
                                                <option>Under Construction</option>
                                                <option>Ready to Move</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Rent Tab -->
                            <div class="tab-pane fade" id="rentTab">
                                <form id="rentForm">
                                    <div class="row align-items-center g-2">
                                        <!-- Location Dropdown -->
                                        <div class="col-md-3">
                                            <div class="dropdown">
                                                <button class="btn btn-light border w-100 text-start" type="button">
                                                    Pune
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Search Input -->
                                        <div class="col-md-6">
                                            <input type="text" class="form-control border" placeholder="Search up to 3 localities or landmarks">
                                        </div>

                                        <!-- Search Button -->
                                        <div class="col-md-3">
                                            <button class="btn btn-danger w-100 py-2 rounded-1">
                                                <i class="bi bi-search"></i> Search
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Filters Row -->
                                    <div class="row align-items-center g-2 pt-3">
                                        <!-- Property Type -->
                                        <div class="col-md-4 d-flex">
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio" name="property_type_buy" id="full_house_buy" checked>
                                                <label class="form-check-label" for="full_house_buy">Full House</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="property_type_buy" id="land_plot_buy">
                                                <label class="form-check-label" for="land_plot_buy">Land/Plot</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Commercial Tab -->
                            <div class="tab-pane fade" id="commercialTab">
                                <form id="commercialForm">
                                    <div class="row align-items-center g-2">
                                        <!-- Location Dropdown -->
                                        <div class="col-md-3">
                                            <div class="dropdown">
                                                <button class="btn btn-light border w-100 text-start" type="button">
                                                    Pune
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Search Input -->
                                        <div class="col-md-6">
                                            <input type="text" class="form-control border" placeholder="Search up to 3 localities or landmarks">
                                        </div>

                                        <!-- Search Button -->
                                        <div class="col-md-3">
                                            <button class="btn btn-danger w-100 py-2 rounded-1">
                                                <i class="bi bi-search"></i> Search
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Filters Row -->
                                    <div class="row align-items-center g-2 pt-3">
                                        <!-- Property Type -->
                                        <div class="col-md-3 d-flex">
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio" name="property_type_buy" id="rent" checked>
                                                <label class="form-check-label" for="rent">Rent</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="buy" id="land_plot_buy">
                                                <label class="form-check-label" for="buy">Buy</label>
                                            </div>
                                        </div>
                                        <!-- Property Status -->
                                        <div class="col-md-3">
                                            <select class="form-select">
                                                <option>Property Type</option>
                                                <option>Office Space</option>
                                                <option>Co-Working</option>
                                                <option>Shop</option>
                                                <option>Showroom</option>
                                                <option>Other Business</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </div>
    </div>
</div>
<section class="mt-5 mb-5">
    <div class="container">
        <div class="text-center mb-4">
            <h4 class="display-5 wow fadeInDown" data-wow-delay="0.1s">Properties by Localities</h4>
            <p class="text-muted">Explore prime properties based on your location</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($data['selectedLocalities'] as $localityData)
                <div class="col-md-4">
                    <div class="shadow rounded p-4 text-center bg-white">
                        <h5 class="mb-3" data-wow-delay="0.1s">{{ $localityData['locality'] }}</h5>
                        <div class="row">
                            @foreach($localityData['properties'] as $property)
                                <div class="col-md-6 col-6 col-xs-12">
                                    <p class="h6 text-primary">{{ $property->builder_name }}</p>
                                    <img src="{{ $property->image }}" class="img-fluid mb-2" alt="{{ $property->title }}" style="height:125px;">
                                    <p class="text-muted">{{ $property->title }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Curated Collections -->
<div class="container-fluid blog mt-3" id="curated_collections">
    <div class="container py-5">
        <h4 class="display-5 wow fadeInDown text-center mb-0" data-wow-delay="0.1s">Curated Collections</h4>
        <p class="m-0 text-center mb-4">Explore prime properties based on your recommendation</p>

        <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php 
                    $properties = [
                        [
                            "name" => "Sukhwani Skylines",
                            "developer" => "By Sukhwani",
                            "location" => "Bhumkar Nagar, Wakad, Pune",
                            "bhk" => "2 & 3 BHK",
                            "size" => "756 SQ. FT.",
                            "price" => "₹89.9L*",
                            "img" => "prop-1.webp",
                            "link" => "https://jfsrealty.in/sukhwani-skylines.html",
                            "category" => "Residential"
                        ],
                        [
                            "name" => "Pharande L-Axis",
                            "developer" => "By Pharande Spaces",
                            "location" => "PCNTDA, Sector No. 6, Moshi, PCMC",
                            "bhk" => "2, 3 & 4 BHK",
                            "size" => "819* SQ. FT.",
                            "price" => "₹97L*",
                            "img" => "prop-1.webp",
                            "link" => "https://jfsrealty.in/pharande-l-axis.html",
                            "category" => "Residential"
                        ],
                        [
                            "name" => "Pharande Puneville",
                            "developer" => "By Pharande Spaces",
                            "location" => "Pune-Bangalore Highway, Punawale",
                            "bhk" => "2 & 2.5 BHK",
                            "size" => "728* SQ. FT.",
                            "price" => "₹80L*",
                            "img" => "prop-1.webp",
                            "link" => "https://jfsrealty.in/pharande-puneville.html",
                            "category" => "Residential"
                        ],
                        [
                            "name" => "Sukhwani Celaeno",
                            "developer" => "By Sukhwani",
                            "location" => "Vibgyor School Rd, Pimple Saudagar",
                            "bhk" => "3 & 4 BHK",
                            "size" => "1325 SQ. FT.",
                            "price" => "₹1.72Cr*",
                            "img" => "prop-1.webp",
                            "link" => "https://jfsrealty.in/sukhwani-celaeno.html",
                            "category" => "Residential"
                        ],
                        [
                            "name" => "Pharande Felicity",
                            "developer" => "By Pharande Spaces",
                            "location" => "Block-B1, FELICITY, Ravet, PCMC",
                            "bhk" => "Shops & Offices",
                            "size" => "245* SQ. FT.",
                            "price" => "₹32L*",
                            "img" => "prop-1.webp",
                            "link" => "https://jfsrealty.in/pharande-felicity.html",
                            "category" => "Commercial"
                        ]
                    ]; 

                    $isMobile = isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/mobile|android|touch|webos|iphone|ipad/i', strtolower($_SERVER['HTTP_USER_AGENT']));
                    $chunkSize = $isMobile ? 1 : 4; // 1 card per slide on mobile, 4 per slide on desktop
                    $chunks = array_chunk($properties, $chunkSize);
                    $first = true; 
                ?>
                
                @foreach($chunks as $chunk)
                    <div class="carousel-item {{ $first ? 'active' : '' }}">
                        <div class="row d-flex justify-content-center">
                            @foreach($chunk as $property)
                                <div class="col-12 col-md-3"> <!-- 1 card on mobile, 4 per slide on desktop -->
                                    <a href="{{ $property['link'] }}" target="_blank">
                                        <div class="blog-item shadow-sm rounded">
                                            <div class="blog-img position-relative">
                                                <img src="{{ asset('theme/frontend/img/' . $property['img']) }}" class="img-fluid rounded-top w-100" alt="">
                                                <div class="blog-categiry">
                                                    <span>{{ $property['category'] }}</span>
                                                </div>
                                            </div>
                                            <div class="blog-content p-3 text-muted">
                                                <p class="mb-1 h6 fw-bold">{{ $property['name'] }}</p>
                                                <p class="mb-0 txt-p">{{ $property['developer'] }}</p>
                                                <p class="mb-0 txt-p">{{ $property['location'] }}</p>
                                                <p class="mb-1 d-flex justify-content-between txt-p">
                                                    <span>{{ $property['bhk'] }}</span> <span>{{ $property['size'] }}</span>
                                                </p>
                                                <hr>
                                                <p class="mb-0 h5 d-flex justify-content-between align-items-center">
                                                    <strong>{{ $property['price'] }}</strong>
                                                    <button class="btn bg-light text-primary btn-md rounded-1 px-3 py-1">
                                                        <i class="fas fa-phone"></i> Contact
                                                    </button>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <?php $first = false; ?>
                @endforeach
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                <i class="fas fa-chevron-left text-dark fs-4"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                <i class="fas fa-chevron-right text-dark fs-4"></i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<!-- Featured Properties -->
<div class="container-fluid blog mt-3" id="featured_properties">
    <div class="container">
        <h4 class="display-5 wow fadeInDown text-center mb-0" data-wow-delay="0.1s">Featured Properties</h4>
        <p class="m-0 text-center mb-4">Explore the most exclusive properties</p>

        <div id="featuredPropertyCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php 
                    $isMobile = isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/mobile|android|touch|webos|iphone|ipad/i', strtolower($_SERVER['HTTP_USER_AGENT']));
                    $chunkSize = $isMobile ? 1 : 4; // 1 card per slide on mobile, 4 per slide on desktop
                    $propertyChunks = $data['featuredProperties']->chunk($chunkSize);
                    $first = true;
                ?>

                @foreach($propertyChunks as $propertyGroup)
                    <div class="carousel-item {{ $first ? 'active' : '' }}">
                        <div class="row g-4 d-flex justify-content-center">
                            @foreach($propertyGroup as $v)
                                <?php 
                                    $img = env('baseURL'). "/" . $v->image;
                                    $title = $v->title;
                                    $category = $v->category_name;
                                    $builder_name = $v->builder_name;
                                    $address = $v->localities . ", " . $v->city;
                                    $bhk = $v->select_bhk;
                                    $area = $v->area;
                                ?>
                                <div class="col-12 col-md-3"> <!-- 1 card per slide on mobile, 4 per slide on desktop -->
                                    <a href="{{ url('property-details/'.$v->properties_id) }}" target="_blank">
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <img src="{{ $img }}" class="img-fluid rounded-top w-100" alt="" style="height: 175px">
                                                <div class="blog-categiry">
                                                    <span>Featured</span>
                                                </div>
                                            </div>
                                            <div class="blog-content p-3 text-muted">
                                                <p class="mb-1 h6 fw-bold">{{ $title }}</p>
                                                <p class="mb-0 txt-p">By {{ $builder_name }}</p>
                                                <p class="mb-0 txt-p">{{ $address }}</p>
                                                <p class="mb-1 d-flex justify-content-between txt-p">
                                                    <span>{{ $bhk }} BHK</span> <span>{{ $area }} SQ. FT.</span>
                                                </p>
                                                <hr>
                                                <p class="mb-0 h5 d-flex justify-content-between align-items-center">
                                                    <strong class="price-format" data-price="{{ $v->from_price }}">{{ $v->from_price }}</strong>
                                                    <button class="btn bg-light text-primary btn-md rounded-1 px-3 py-1">
                                                        <i class="fas fa-phone"></i> Contact
                                                    </button>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <?php $first = false; ?>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#featuredPropertyCarousel" data-bs-slide="prev">
                <i class="fas fa-chevron-left text-dark fs-4"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#featuredPropertyCarousel" data-bs-slide="next">
                <i class="fas fa-chevron-right text-dark fs-4"></i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<!-- All Properties List -->
<div class="container-fluid blog mb-5" id="old_data">
    <div class="container py-5">
        <h4 class="display-5 wow fadeInDown text-center mb-0" data-wow-delay="0.1s">All Properties</h4>
        <p class="m-0 text-center mb-4">Explore prime properties based on your recommendation</p>

        <div id="AllPropertyCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php 
                    $isMobile = isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/mobile|android|touch|webos|iphone|ipad/i', strtolower($_SERVER['HTTP_USER_AGENT']));
                    $chunkSize = $isMobile ? 1 : 4; // 1 card per slide on mobile, 4 per slide on desktop
                    $propertyChunks = $data['allProperties']->chunk($chunkSize);
                    $first = true;
                ?>

                @foreach($propertyChunks as $propertyGroup)
                    <div class="carousel-item {{ $first ? 'active' : '' }}">
                        <div class="row g-4 d-flex justify-content-center">
                            @foreach($propertyGroup as $v)
                                <?php 
                                    $img = env('baseURL'). "/" . $v->image;
                                    $title = $v->title;
                                    $category = $v->category_name;
                                    $builder_name = $v->builder_name;
                                    $address = $v->localities . ", " . $v->city;
                                    $bhk = $v->select_bhk;
                                    $area = $v->area;
                                ?>
                                <div class="col-12 col-md-3"> <!-- 1 card per slide on mobile, 4 per slide on desktop -->
                                    <a href="{{ url('property-details/'.$v->properties_id) }}" target="_blank">
                                        <div class="blog-item">
                                            <div class="blog-img">
                                                <img src="{{ $img }}" class="img-fluid rounded-top w-100" alt="" style="height: 175px">
                                                <div class="blog-categiry">
                                                    <span>{{ $category }}</span>
                                                </div>
                                            </div>
                                            <div class="blog-content p-3 text-muted">
                                                <p class="mb-1 h6 fw-bold">{{ $title }}</p>
                                                <p class="mb-0 txt-p">By {{ $builder_name }}</p>
                                                <p class="mb-0 txt-p">{{ $address }}</p>
                                                <p class="mb-1 d-flex justify-content-between txt-p">
                                                    <span>{{ $bhk }} BHK</span> <span>{{ $area }} SQ. FT.</span>
                                                </p>
                                                <hr>
                                                <p class="mb-0 h5 d-flex justify-content-between align-items-center">
                                                    <strong class="price-format" data-price="{{ $v->from_price }}">{{ $v->from_price }}</strong>
                                                    <button class="btn bg-light text-primary btn-md rounded-1 px-3 py-1">
                                                        <i class="fas fa-phone"></i> Contact
                                                    </button>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <?php $first = false; ?>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#AllPropertyCarousel" data-bs-slide="prev">
                <i class="fas fa-chevron-left text-dark fs-4"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#AllPropertyCarousel" data-bs-slide="next">
                <i class="fas fa-chevron-right text-dark fs-4"></i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<!-- Feature Start -->
<div class="container-fluid feature bg-light py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Features</h4>
            <h2 class="display-5">Why Choose Us?</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="far fa-handshake fa-3x"></i>
                    </div>
                    <h4 class="mb-4">Trusted Company</h4>
                    <p>Trust is our foundation. With experience and a strong track record, we guide clients confidently through their financial journeys.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fas fa-gift fa-3x"></i>
                    </div>
                    <h4 class="mb-4">Unlimited Rewards</h4>
                    <p>Earn income for each successful referral. We offer performance bonuses to unlock more earning potential.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa fa-bullseye fa-3x"></i>
                    </div>
                    <h4 class="mb-4">Fast & Easier Process</h4>
                    <p>A fast & simple loan process provides quick approvals, minimal paperwork, & access to funds within 7 working days.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fas fa-chart-line fa-3x"></i>
                    </div>
                    <h4 class="mb-4">High Range Loan</h4>
                    <p>A high range loan of up to ₹100Cr. offers substantial funding for major investments or purchases, with flexible terms & competitive rates.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Service Start -->
<div class="container-fluid service py-5">
    <div class="container py-3">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Services</h4>
            <h1 class="display-4 mb-4">We Provide Best Services</h1>
            <p class="mb-0">Choose your loan amount, answer a few questions, and receive an instant loan offer. Share the necessary documents with our representative effortlessly, and select the final loan offer with terms that suit you best.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('theme') }}/frontend/img/Home_Loan.jpg" class="img-fluid rounded-top w-100" alt="">
                        <!-- <div class="service-icon p-3">
                            <i class="fa-solid fa-house-chimney fa-2x"></i>
                        </div> -->
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">NRI Friendly</a>
                            <p class="mb-4">We understand you're seeking a new home, with low rates & a seamless process, we’re here to help you through this important financial decision.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('theme') }}/frontend/img/Project_Loan.jpg" class="img-fluid rounded-top w-100" alt="">
                        <!-- <div class="service-icon p-3">
                            <i class="fa-solid fa-building-shield fa-2x"></i>
                        </div> -->
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Property Management</a>
                            <p class="mb-4">We simplify construction financing with low rates and an easy online application, offering tailored loans that ensure a smooth and timely process.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.8s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('theme') }}/frontend/img/Loan_Against_Property.jpg" class="img-fluid rounded-top w-100" alt="">
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Investor Deals</a>
                            <p class="mb-4">Jfinserv offers Loan Against Property with flexible repayment options, secured by your property. Check your eligibility and enjoy exclusive add-on and tax benefits.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.8s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('theme') }}/frontend/img/Loan_Against_Property.jpg" class="img-fluid rounded-top w-100" alt="">
                        <!-- <div class="service-icon p-3">
                            <i class="fa-solid fa-house-laptop fa-2x"></i>
                        </div> -->
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Loan Assisstance</a>
                            <p class="mb-4">Jfinserv offers Loan Against Property with flexible repayment options, secured by your property. Check your eligibility and enjoy exclusive add-on and tax benefits.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('theme') }}/frontend/img/MSME_Loan.jpg" class="img-fluid rounded-top w-100" alt="">
                        <!-- <div class="service-icon p-3">
                            <i class="fa-solid fa-business-time fa-2x"></i>
                        </div> -->
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Group Booking</a>
                            <p class="mb-4">This service meets the diverse needs of small and medium businesses. Whether you're expanding, investing in equipment, or increasing capital.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.8s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('theme') }}/frontend/img/Loan_Against_Property.jpg" class="img-fluid rounded-top w-100" alt="">
                        <!-- <div class="service-icon p-3">
                            <i class="fa-solid fa-house-laptop fa-2x"></i>
                        </div> -->
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Property Visits & Booking</a>
                            <p class="mb-4">Jfinserv offers Loan Against Property with flexible repayment options, secured by your property. Check your eligibility and enjoy exclusive add-on and tax benefits.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial Start -->
<div class="container-fluid testimonial bg-light py-5">
    <div class="container mb-5 pb-3">
        <div class="text-center mx-auto pb-3 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Testimonial</h4>
            <h2 class="display-4">Hear from Our Customers</h2>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
            <div class="testimonial-item bg-white rounded">
                <div class="row g-0">
                    <div class="col-12 col-lg-12 col-xl-12">
                        <div class="d-flex flex-column my-auto text-start p-4">
                            <h4 class="text-dark mb-0">Vishal Sarraf</h4>
                            <p class="mb-3">Businessman</p>
                            <div class="d-flex text-primary mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="mb-0">JFinserv made my home loan process stress-free and quick. Their expert team guided me at every step, ensuring minimal paperwork and a competitive interest rate. Highly recommended for anyone seeking financial assistance!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-white rounded">
                <div class="row g-0">
                    <div class="col-12 col-lg-12 col-xl-12">
                        <div class="d-flex flex-column my-auto text-start p-4">
                            <h4 class="text-dark mb-0">Dr. Neha Pawar</h4>
                            <p class="mb-3">Doctor</p>
                            <div class="d-flex text-primary mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star text-body"></i>
                            </div>
                            <p class="mb-0">Thanks to JFinserv, I secured a project loan effortlessly. Their dedicated support and transparent process made a complex procedure seem simple. I appreciate their commitment to helping clients achieve their financial goals.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-white rounded">
                <div class="row g-0">
                    <div class="col-12 col-lg-12 col-xl-12">
                        <div class="d-flex flex-column my-auto text-start p-4">
                            <h4 class="text-dark mb-0">Rahul Sonawane</h4>
                            <p class="mb-3">IT Professional</p>
                            <div class="d-flex text-primary mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star text-body"></i>
                            </div>
                            <p class="mb-0">JFinserv exceeded my expectations with their quick approvals & low-interest rates. The team's professionalism & expertise gave me confidence throughout the loan process. I would highly recommend them!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Start -->
<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">From Blog</h4>
            <h2 class="display-4 mb-4">News And Updates</h2>
        </div>

        <div class="row g-4 justify-content-center">
            @if(isset($data['blogs']) && $data['blogs']->count() > 0)
                @foreach ($data['blogs'] as $blog)
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid blogs-image" alt="{{ $blog->title }}">
                                <div class="blog-categiry bg-dark py-2 px-4">
                                    <span>{{ $blog->category_name }}</span>
                                </div>
                            </div>

                            <div class="blog-content p-4">
                                <div class="blog-comment d-flex justify-content-between mb-3">
                                    <div class="small">
                                        <span class="fa fa-calendar text-primary"></span> 
                                        {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}
                                    </div>
                                </div>
                                <a href="{{ route('blogs.showById', ['id' => $blog->id]) }}" class="h5 d-inline-block">
                                    {{ Str::limit($blog->title, 40) }}
                                </a>
                                <p class="mb-3">{!! Str::limit(strip_tags($blog->description), 100) !!}</p>
                                <a href="{{ route('blogs.showById', ['id' => $blog->id]) }}" class="btn p-0">
                                    Read More <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">No blog posts available.</p>
            @endif
        </div>
    </div>
</div>


<div id="search_data"></div>
    


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
$(document).ready(function() {
    $('#searchButton').click(function(event) {
        event.preventDefault(); //Prevent page reload

        //Detect active tab correctly
        let activeTab = $('.nav-tabs .nav-link.active').data('tab'); 
        let propertyType = 1; // Default to "Buy"

        if (activeTab === "rent") {
            propertyType = 3; // Rent
        } else if (activeTab === "commercial") {
            propertyType = 2; // Commercial
        }

        let range_id = $('#range_id').val();
        let category_type = $('#category_type').val();
        let location_name = $('#location_name').val();

        $.ajax({
            url: "{{ url('search_properties') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                property_type_id: propertyType, //Send the correct property type
                range_id: range_id,
                category_type: category_type,
                location_name: location_name
            },
            success: function(response) {
                $('#old_data').hide(); //Hide previous results
                $('#search_data').html(response); //Show filtered properties
                history.pushState(null, '', window.location.pathname); //Remove URL query params
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });

    //Update active tab & ensure correct filtering
    $('.nav-link').click(function() {
        $('.nav-link').removeClass('text-danger fw-bold').addClass('text-muted'); // Reset styles
        $(this).addClass('text-danger fw-bold').removeClass('text-muted'); // Highlight active tab
    });

    //Prevent form submission when pressing "Enter"
    $('form').submit(function(event) {
        event.preventDefault();
    });
});
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fullHouseRadio = document.getElementById("full_house_buy");
        const landPlotRadio = document.getElementById("land_plot_buy");
        const bhkStatusFields = document.querySelectorAll(".bhk-status");

        function toggleFields() {
            if (landPlotRadio.checked) {
                bhkStatusFields.forEach(field => field.style.display = "none");
            } else {
                bhkStatusFields.forEach(field => field.style.display = "block");
            }
        }

        // Attach event listeners
        fullHouseRadio.addEventListener("change", toggleFields);
        landPlotRadio.addEventListener("change", toggleFields);

        // Initial state check
        toggleFields();
    });
</script>

<script>
    function formatRupees(amount) {
        amount = parseFloat(amount);
        if (amount >= 10000000) {
            return '₹ ' + (amount / 10000000).toFixed(2) + ' Cr';
        } else if (amount >= 100000) {
            return '₹ ' + (amount / 100000).toFixed(2) + ' L';
        }
        return '₹ ' + amount.toLocaleString('en-IN');
    }

    document.addEventListener("DOMContentLoaded", function () {
        let priceElements = document.querySelectorAll(".price-format");
        
        priceElements.forEach(function (element) {
            let priceValue = element.getAttribute("data-price");
            element.innerText = formatRupees(priceValue);
        });
    });
</script>

@endsection
