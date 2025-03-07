@extends('frontend.layouts.header')
@section('title', "Blog Details Page - Jfinserv")
@section('description', "")
@section('keywords', "")

@section('content')
<!-- Details Start -->
<div class="container-fluid about">
    <div class="container mb-5 pt-3 pb-5">
        <div class="row text-display" style="font-family: 'DM Sans';">
            <p><a href="{{ url('/') }}">Home</a> > <a href="#">Blogs</a> > {{ $blog->title }}</p>
            <div class="col-xl-9 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="thumbnail_slider">
                                <!-- Primary Slider Start-->
                                <div id="primary_slider">
                                    <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded w-100" alt="{{ $blog->title }}">
                                </div>
                                <!-- Primary Slider End-->
                            </div>
                        </div>
                        <div class="col-md-12 pt-2 pb-2">
                            <div class="property_block_wrap style-2">
                                <div id="clOne" class="panel-collapse collapse show" aria-labelledby="clOne">
                                    <div class="block-body">
                                        <div class="row mt-3">
                                            <div class="col-md-10">
                                                <p class="mb-1">Published On: 03/03/2025</p> 
                                                <p class="h2 mb-0 text-capitalize fw-bold">{{ $blog->title }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="about-item-content mt-3">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="property_block_wrap style-2">
                                <div class="block-body">
                                    {!! $blog->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="about-item-content bg-white rounded p-4 mt-3 shadow-sm">
                    <div class="row g-4">
                        <div class="col-md-8">
                            <div class="property_block_wrap style-2">
                                <div class="block-body">
                                    <h3>Comments:</h3>
                                    <form action="{{ route('enquiry.store') }}" method="POST">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border" id="name" name="name" value="{{ old('name') }}" placeholder="Your Name" required>
                                                    <label for="name">Your Name</label>
                                                </div>                                    
                                            </div>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control border" name="email" id="email" value="{{ old('email') }}" placeholder="Your Email" required>
                                                    <label for="email">Your Email</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control border" id="message" name="message" placeholder="Leave a message here" style="height: 120px" required>{{ old('message') }}</textarea>
                                                    <label for="message">Write Your Comment...</label>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 wow fadeInRight" data-wow-delay="0.2s">
                <div class="bg-white rounded p-3 shadow-sm">
                    <div class="row g-4 justify-content-center">
                        <div class="sides-widget">
                            <div class="sides-widget-header">
                                <div class="sides-widget-details">
                                    <h4>Trending Blogs</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="sides-widget-body simple-form">
                                @foreach($featuredBlogs as $featuredBlog)
                                    <div class="row align-items-center mt-2">
                                        <div class="col-md-5">
                                            <img src="{{ asset('storage/' . $blog->image) }}" class="trendy-blog img-fluid" alt="{{ $blog->title }}">
                                        </div>
                                        <div class="col-md-7">
                                            <p class="mb-0"><a href="{{ route('blogs.showById', ['id' => $blog->id]) }}">{{ $featuredBlog->title }}</a></p>
                                            <p class="mb-0"><small><em>{{ $featuredBlog->created_at->format('F d, Y') }}</em></small></p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>                            
                    </div>
                </div>

                
                <div class="bg-white rounded p-3 mt-3 shadow-sm">
                    <div class="row g-4 justify-content-center">
                        <?php if(isset($featuredProperties) && count($featuredProperties) > 0): ?>
                        <div class="col-12">
                            <h5 class="mb-0">Featured Properties</h5>
                            <hr class="mt-2">
                            
                            <?php foreach ($featuredProperties as $v): ?>
                                <?php 
                                    $img = $v->image;
                                    $title = $v->title;
                                    $builder_name = $v->builder_name;
                                ?>
                                
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-5">
                                        <img src="<?php echo $img; ?>" class="trendy-blog img-fluid" alt="<?php echo $title; ?>">
                                    </div>
                                    <div class="col-md-7">
                                        <p class="mb-0"><?php echo $title; ?><br>By <?php echo $builder_name; ?></p>
                                        <p class="mb-0">
                                            <a href="<?php echo url('property-details/'.$v->properties_id); ?>" target="_blank">
                                                <small><em>View More <i class="fas fa-long-arrow-right"></i></em></small>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php else: ?>
                            <p>No featured properties available.</p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection