<div class="container blog py-5" id="search_result">
       
    <?php 
    if(count($data['allProperties']) > 0) {  ?>
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h2 class="display-4 mb-4">Search Result</h2>
            <p class="mb-0">Properties listed in our website.</p>
        </div>

        <div class="row g-4 pb-5 justify-content-center">
            <?php
                foreach($data['allProperties'] as $v) {  
                    $price_range = $v->from_price. " to ". $v->to_price;
                    $img = env('baseURL'). "/".$v->image;
                    //$boucher = env('baseURL'). "/".$v->boucher;
                    $title = $v->title;
                    $category = $v->category_name;
                    $description = $v->property_details;
                    $bhk = $v->select_bhk;
                    $address = $v->address;
                    ?>
                    <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ $img }}" class="img-fluid rounded-top w-100" alt="" style="height: 250px">
                                <div class="blog-categiry py-2 px-4">
                                    <span>{{ $category }}</span>
                                </div>
                            </div>
                            <div class="blog-content p-4">
                                <p class="mb-0">{{ $bhk }} BHK Flat</p>
                                <p class="mb-3 h4 d-inline-block"><strong>₹ {{ $v->from_price }}<sup>*</sup></strong><span class="px-3">|</span><em>1024 sqft</em></p>
                                <!-- <p class="h4 d-inline-block mb-3">{{ $title }}</p> -->
                                <p class="mb-3">{{ $description }}</p>
                                <p class="mb-3">{{ $address }}</p>
                                <a href="#" class="btn p-0">Read More  <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php 
                }
            }
            
            else{  ?>
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h2 class="display-4 mb-4">Search Result</h2>
                    <p>Match result not found ! Search with alternative option.</p>
                </div>
                <div class="row g-4 justify-content-center">
            <?php }
    ?>
</div>