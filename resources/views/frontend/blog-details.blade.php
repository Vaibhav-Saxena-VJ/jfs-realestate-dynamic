@extends('frontend.layouts.header')
@section('title', "Blog Details Page - Jfinserv")
@section('description', "")
@section('keywords', "")

@section('content')
<!-- Details Start -->
<div class="container-fluid about">
    <div class="container mb-5 pt-3 pb-5">
        <div class="row text-display" style="font-family: 'DM Sans';">
            <p><a href="{{ url('/') }}">Home</a> > <a href="#">Blogs</a> > Blog Title</p>
            <div class="col-xl-9 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="thumbnail_slider">
                                <!-- Primary Slider Start-->
                                <div id="primary_slider">
                                    <img src="{{ asset('theme') }}/frontend/img/banner-1.png" class="img-fluid rounded w-100" alt="Additional Property Image">
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
                                                <p class="h3 mb-0 text-capitalize">Blog Title</h4>
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
                                    <h2>Introduction:</h2>
                                    <p>Selling a house for cash can be overwhelming, especially when you need to close quickly. At DNT Home Buyers, We Buy Houses Fast New Jersey for cash, ensuring a fast and hassle-free process. Whether you’re facing foreclosure or divorce, or want to sell without the headaches of traditional real estate transactions, we are here to help.</p>
                                    <p>Last year, after receiving feedback from surveys and customer interviews, Realtor.com’s Enterprise Systems team was challenged to clarify our billing models for our customers. Internally, we were able to report on most of these questions and provide answers; however, customer self-service options were limited.</p>
                                    <p>Customers could access some billing information by accessing Account Statements and Invoices through their Product & Billing Portal. Although these documents had been revised a few times to mirror bank statements and other industry-standard documents, they still didn’t exist in a format that met customers’ needs.</p>
                                    <p>For example, the Account Statements and Invoices presented a running list of information in chronological order, which was often confusing and generated more questions than answers. Also, for larger customers, these documents could be many pages long without a clear summary to provide the information they need. To solve this problem, our business stakeholders came to us with a new proposal to modify the current Account Statements and Invoices. The new format would need to provide summary-level information and enable customers to drill down into specific data items. </p>
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
                                <!-- <div class="agent-photo">
                                    <img src="{{ asset('theme/frontend/img/contact-avatar.png') }}" alt="Jfinmate">
                                    
                                </div> -->
                                <div class="sides-widget-details">
                                    <h4>Trending Blogs</h4>
                                    <!-- <a href="tel:+17817548182"><span><i class="lni-phone-handset"></i> +17817548182</span></a> -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="sides-widget-body simple-form">
                                <div class="row align-items-center">
                                    <div class="col-md-4"><img src="https://img.staticmb.com/mbcontent/images/uploads/2024/1/pay-rent-using-a-credit-card-online.jpg" class="trendy-blog" alt="Additional Property Image"></div>
                                    <div class="col-md-8">
                                        <p class="mb-0">Top 10 Best Properties Near Pune</p>
                                        <p class="mb-0"><small><em>January 25, 2025</em></small></p>
                                    </div>
                                </div>
                                <div class="row align-items-center mt-2">
                                    <div class="col-md-4"><img src="https://img.staticmb.com/mbcontent/images/uploads/2024/1/pay-rent-using-a-credit-card-online.jpg" class="trendy-blog" alt="Additional Property Image"></div>
                                    <div class="col-md-8">
                                        <p class="mb-0">Top 10 Best Properties Near Pune</p>
                                        <p class="mb-0"><small><em>January 25, 2025</em></small></p>
                                    </div>
                                </div>
                                <div class="row align-items-center mt-2">
                                    <div class="col-md-4"><img src="https://img.staticmb.com/mbcontent/images/uploads/2024/1/pay-rent-using-a-credit-card-online.jpg" class="trendy-blog" alt="Additional Property Image"></div>
                                    <div class="col-md-8">
                                        <p class="mb-0">Top 10 Best Properties Near Pune</p>
                                        <p class="mb-0"><small><em>January 25, 2025</em></small></p>
                                    </div>
                                </div>
                                <div class="row align-items-center mt-2">
                                    <div class="col-md-4"><img src="https://img.staticmb.com/mbcontent/images/uploads/2024/1/pay-rent-using-a-credit-card-online.jpg" class="trendy-blog" alt="Additional Property Image"></div>
                                    <div class="col-md-8">
                                        <p class="mb-0">Top 10 Best Properties Near Pune</p>
                                        <p class="mb-0"><small><em>January 25, 2025</em></small></p>
                                    </div>
                                </div>
                                <div class="row align-items-center mt-2">
                                    <div class="col-md-4"><img src="https://img.staticmb.com/mbcontent/images/uploads/2024/1/pay-rent-using-a-credit-card-online.jpg" class="trendy-blog" alt="Additional Property Image"></div>
                                    <div class="col-md-8">
                                        <p class="mb-0">Top 10 Best Properties Near Pune</p>
                                        <p class="mb-0"><small><em>January 25, 2025</em></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>
                <div class="bg-white rounded p-3 mt-3 shadow-sm">
                    <div class="row g-4 justify-content-center">
                        <div class="col-12">
                            <h5 class="mb-0">Featured Properties</h5><hr class="mt-2">
                            <!-- Brochure Box with Image -->
                            <div class="row align-items-center">
                                <div class="col-md-5"><img src="https://img.staticmb.com/mbcontent/images/uploads/2024/1/pay-rent-using-a-credit-card-online.jpg" class="trendy-blog" alt="Additional Property Image"></div>
                                <div class="col-md-7">
                                    <p class="mb-0">Luxaury Hilux<br>By Myntra</p>
                                    <p class="mb-0"><a href="#"><small><em>View More <i class="fas fa-long-arrow-right"></i></em></small></a></p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-5"><img src="https://img.staticmb.com/mbcontent/images/uploads/2024/1/pay-rent-using-a-credit-card-online.jpg" class="trendy-blog" alt="Additional Property Image"></div>
                                <div class="col-md-7">
                                    <p class="mb-0">Luxaury Hilux<br>By Myntra</p>
                                    <p class="mb-0"><a href="#"><small><em>View More <i class="fas fa-long-arrow-right"></i></em></small></a></p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-5"><img src="https://img.staticmb.com/mbcontent/images/uploads/2024/1/pay-rent-using-a-credit-card-online.jpg" class="trendy-blog" alt="Additional Property Image"></div>
                                <div class="col-md-7">
                                    <p class="mb-0">Luxaury Hilux<br>By Myntra</p>
                                    <p class="mb-0"><a href="#"><small><em>View More <i class="fas fa-long-arrow-right"></i></em></small></a></p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-5"><img src="https://img.staticmb.com/mbcontent/images/uploads/2024/1/pay-rent-using-a-credit-card-online.jpg" class="trendy-blog" alt="Additional Property Image"></div>
                                <div class="col-md-7">
                                    <p class="mb-0">Luxaury Hilux<br>By Myntra</p>
                                    <p class="mb-0"><a href="#"><small><em>View More <i class="fas fa-long-arrow-right"></i></em></small></a></p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-5"><img src="https://img.staticmb.com/mbcontent/images/uploads/2024/1/pay-rent-using-a-credit-card-online.jpg" class="trendy-blog" alt="Additional Property Image"></div>
                                <div class="col-md-7">
                                    <p class="mb-0">Luxaury Hilux<br>By Myntra</p>
                                    <p class="mb-0"><a href="#"><small><em>View More <i class="fas fa-long-arrow-right"></i></em></small></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection