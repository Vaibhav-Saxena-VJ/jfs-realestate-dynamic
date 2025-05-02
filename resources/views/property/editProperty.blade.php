@extends('layouts.header')
@section('title')
    @parent
    JFS | Update Property
@endsection
@section('content')

@parent

<style>
    #img-preview {
  display: none;
  width: 470px;
  margin-bottom: 20px;
  border-radius: 2%;
  padding: 1%;
}
#img-preview img {
  width: 100%;
  height: auto;
  display: block;
}
</style>

<?php 
    
    foreach($data['propertie_details'] as $v) {  
        $price_range = $v->from_price. " to ". $v->to_price;
        $img = env('baseURL'). "/".$v->image;
        $boucher = env('baseURL'). "/".$v->boucher;
        
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
<form id="editProperty">
    @csrf
    <!-- Breadcrumbs -->
    <div class="card-header py-3">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="d-flex align-items-center">
                <ol class="breadcrumb m-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('partnerDashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('allProperties') }}">List of Property</a></li> 
                    <li class="breadcrumb-item active" aria-current="page">Update Property Details</li>
                </ol>
            </nav>
            <div class="hstack gap-3">
                <button class="btn btn-light border btn-icon-text"><i class="bi bi-x"></i> <span class="text">Cancel</span></button>
                <!-- <button type="submit" class="btn btn-primary btn-icon-text"><i class="bi bi-save"></i> <span class="text">Update</span></button> -->
                <input type="submit" class="btn btn-primary btn-icon-text" value="Update">
            </div>
        </div>
    </div>
    
    <!-- Begin Page Content -->     
    <div class="container-fluid bg-white">
        <input type="hidden" name="creator_id" value=" {{ Session::get('user_id') }}" />
        <input type="hidden" name="propertie_id" value=" {{ $v->properties_id }}" />              

        <!-- Main content -->
        <div class="row">
            <!-- Left side -->
            <div class="col-lg-8">
                <!-- Basic information -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Builder Name</label>
                                <input type="text" name="builder_name" class="form-control" placeholder="Builder Name"  value="{{ $v->builder_name }}" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Project Name</label>
                                <input type="text" name="property_title" class="form-control" placeholder="Property Title" value="{{ $v->title }}"  />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Land Type</label>
                                <select class="form-control" name="land_type">
                                    <option>Select Type</option>
                                    <option value="Flat" {{ old('land_type', $v->land_type) == 'Flat' ? 'selected' : '' }}>Flat</option>
                                    <option value="Bunglow" {{ old('land_type', $v->land_type) == 'Bunglow' ? 'selected' : '' }}>Bunglow</option>
                                    <option value="Villa" {{ old('land_type', $v->land_type) == 'Villa' ? 'selected' : '' }}>Villa</option>
                                    <option value="Plot" {{ old('land_type', $v->land_type) == 'Plot' ? 'selected' : '' }}>Plot</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Property Type</label>
                                <select name="property_type_id" class="form-control">
                                    <?php
                                        foreach($data['category'] as $r){
                                            $sel = $v->property_type_id;
                                            $option = $r->pid;

                                            $isSelected =""; 
                                            if($option == $sel){
                                                $isSelected = "selected";
                                            }
                                            echo '<option value="'.$option.'"'.$isSelected.'>'.$r->category_name.'</option>';
                                    ?>                                                   

                                    <?php    
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Starting Price</label>
                                <input type="text" name="s_price" class="form-control" placeholder="Staring price" value="{{ $v->s_price }}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Carpet area</label>
                                <input type="text" name="area" class="form-control" placeholder="Carpet Area" value="{{ $v->area }}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Built-up area</label>
                                <input type="text" name="builtup_area" class="form-control" placeholder="Builtup Area" value="{{ $v->builtup_area }}" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">Select BHK</label>
                                <select class="form-control" name="select_bhk">
                                    <option>Select BHK</option>
                                    @php
                                        $bhkOptions = ['1','2','3','4','5','6','2 & 3','2, 3 & 4','3 & 4','3, 4 & 5'];
                                        $selectedBhk = $data['propertie_details'][0]->select_bhk ?? '';
                                    @endphp

                                    @foreach ($bhkOptions as $option)
                                        <option value="{{ $option }}" {{ $selectedBhk == $option ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Property Description</label>
                                <textarea name="property_description" id="summernote-property" class="form-control" rows="5">
                                    {!! $data['propertie_details'][0]->property_details !!}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Short Description</label>
                                <textarea name="short_description" id="summernote-short" class="form-control" rows="5">
                                    {!! $v->short_description ?? '' !!}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Property Address</label>
                                <textarea name="property_address" class="form-control" rows="1" style="resize:none" maxlength="250" value="" >{{ $v->address }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Area in City</label>
                                <input type="text" name="localities" class="form-control" placeholder="Localities" value="{{ $v->localities }}" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control" placeholder="City" value="{{ $v->city }}" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Latitude</label>
                                <input type="text" name="latitude" class="form-control" value="{{ $data['propertie_details'][0]->latitude ?? '' }}" placeholder="Latitude" required>
                            </div>
                        </div>

                        <!-- Longitude -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Longitude</label>
                                <input type="text" name="longitude" class="form-control" value="{{ $data['propertie_details'][0]->longitude ?? '' }}" placeholder="Longitude" required>
                            </div>
                        </div>

                        <!-- Nearby Location 1 -->
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Nearby Locations</label>
                                @if(!empty($v->nearby_locations))  
                                    @php
                                        $nearbyLocations = json_decode($v->nearby_locations, true); // Decode JSON to an array
                                    @endphp

                                    @if(is_array($nearbyLocations) && count($nearbyLocations) > 0)
                                        <div class="row g-3">  <!-- Bootstrap Grid for Proper Spacing -->
                                            @foreach($nearbyLocations as $location)
                                                @if(!empty($location))
                                                    <div class="col-md-4 col-sm-6">
                                                        <input type="text" name="nearby[]" class="form-control mb-2" 
                                                            placeholder="example: Lexicon - 02 km" 
                                                            value="{{ $location }}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Email ID</label>
                                <input type="email" class="form-control jixlink2" name="email_id" value="{{ $v->email }}" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Contact Number</label>
                                <input type="tel" class="form-control jixlink2" name="contact_number" value="{{ $v->contact }}" >
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Schema Markup / Open Graph Meta / Twitter Card Meta</label>
                                <textarea name="schema_markup" id="schema_markup" class="form-control" rows="5">
                                    {!! $v->schema_markup !!}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">FAQs</label>
                                <div id="faqSection">
                                    @if (!empty($faqs) && $faqs->count())
                                        @foreach ($faqs as $faq)
                                            <div class="faq-item border rounded p-3 mb-3">
                                                <div class="mb-2">
                                                    <label class="form-label">Question</label>
                                                    <input type="text" name="faq_question[]" class="form-control" value="{{ $faq->question }}" placeholder="Enter FAQ Question">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Answer</label>
                                                    <textarea name="faq_answer[]" class="form-control" rows="3" placeholder="Enter FAQ Answer">{{ $faq->answer }}</textarea>
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
                                            </div>
                                        @endforeach
                                    @else
                                        <!-- Default empty FAQ block if no data -->
                                        <div class="faq-item border rounded p-3 mb-3">
                                            <div class="mb-2">
                                                <label class="form-label">Question</label>
                                                <input type="text" name="faq_question[]" class="form-control" placeholder="Enter FAQ Question">
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Answer</label>
                                                <textarea name="faq_answer[]" class="form-control" rows="3" placeholder="Enter FAQ Answer"></textarea>
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
                                        </div>
                                    @endif
                                </div>
                                <button type="button" class="btn btn-primary btn-sm mt-2" id="addFaqBtn">Add More FAQ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right side -->
            <div class="col-lg-4 pb-3 bg-light">
                <div class="card-body">
                    <div class="form-group">
                        <label for="slug">Slug (URL)</label>
                        <input type="text" class="form-control" name="slug" id="slug" value="{{ $v->slug ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter Meta Title" value="{{ $v->meta_title ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description">{{ $v->meta_description ?? '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea class="form-control" name="meta_keywords" id="meta_keywords" placeholder="Enter Meta Keywords (comma separated)">{{ $v->meta_keywords ?? '' }}</textarea>
                    </div>
                </div>
                <div class="card-body">
                    <label class="form-label">Rera No.</label>
                    <input type="text" name="rera" class="form-control" placeholder="Rera No." value="{{ $v->rera }}" />
                </div>
                <div class="card-body">
                    <h3 class="h6">Property Image</h3>
                    <img src="{{ $img }}" class="img-thumbnail" id="old_image"/>
                    <div id="img-preview" class="img-thumbnail"></div>
                    <input class="form-control mt-2" type="file" accept=".jpg,.jpeg,.png,.webp " name="property_image"  id="choose-file"/>
                </div>
                <div class="card-body">
                    <h3 class="h6">Property Boucher</h3>
                    <a href = "{{ $boucher }}">Boucher URL </a>
                    <input class="form-control" type="file" accept=".pdf" name="property_voucher"  />
                </div>
                <!-- Notes -->
                <div class="card-body">
                    <label class="form-label">Price Range</label>
                    <select name="price_range" class="form-control">
                        <?php
                            foreach($data['range'] as $r){
                                
                                $range = $r->from_price." to ".$r->to_price;
                                $sel = $v->price_range_id;
                                $option = $r->range_id;

                                $isSelected =""; 
                                if($option == $sel){
                                    $isSelected = "selected";
                                }
                                echo '<option value="'.$option.'"'.$isSelected.'>'.$range.'</option>';
                        ?>
                        <?php } ?>
                    </select>
                </div>  
                
                <div class="card-body">
                    <label for="amenities"><strong>Select Amenities:</strong></label><br>
                    <input type="checkbox" name="amenities[]" value="WiFi"> WiFi<br>
                    <input type="checkbox" name="amenities[]" value="Parking"> Parking<br>
                    <input type="checkbox" name="amenities[]" value="Swimming Pool"> Swimming Pool<br>
                    <input type="checkbox" name="amenities[]" value="Balcony"> Balcony<br>
                    <input type="checkbox" name="amenities[]" value="Garden"> Garden<br>
                    <input type="checkbox" name="amenities[]" value="Security"> Security<br>
                    <input type="checkbox" name="amenities[]" value="Fitness Center"> Fitness Center<br>
                    <input type="checkbox" name="amenities[]" value="Air Conditioning"> Air Conditioning<br>
                    <input type="checkbox" name="amenities[]" value="Central Heating"> Central Heating<br>
                    <input type="checkbox" name="amenities[]" value="Laundry Room"> Laundry Room<br>
                    <input type="checkbox" name="amenities[]" value="Pets Allowed"> Pets Allowed<br>
                    <input type="checkbox" name="amenities[]" value="Spa & Massage"> Spa & Massage<br>
                </div>
            </div>
        </div>         
    </div> 
</form>   
<?php } ?>
            
@endsection
@section('script')
@parent

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

<script>
    $(document).ready(function () {
        // Initialize Summernote for Property Description
        $('#summernote-property').summernote({
            height: 400,
            fontNames: ['Arial', 'Courier New', 'Times New Roman', 'Verdana', 'Helvetica', 'Sans Serif'],
            fontNamesIgnoreCheck: ['Times New Roman'],
            callbacks: {
                onImageUpload: function (files) {
                    for (let i = 0; i < files.length; i++) {
                        uploadImage(files[i], 'property');
                    }
                }
            }
        });

        // Initialize Summernote for Short Description
        $('#summernote-short').summernote({
            height: 200,
            fontNames: ['Arial', 'Courier New', 'Times New Roman', 'Verdana', 'Helvetica', 'Sans Serif'],
            fontNamesIgnoreCheck: ['Times New Roman'],
            callbacks: {
                onImageUpload: function (files) {
                    for (let i = 0; i < files.length; i++) {
                        uploadImage(files[i], 'short');
                    }
                }
            }
        });

        // Function to upload image
        function uploadImage(file, editorType) {
            let data = new FormData();
            data.append("file", file);
            data.append("_token", $('meta[name="csrf-token"]').attr('content'));

            $.ajax({
                url: '/upload-summernote-image',
                method: "POST",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if (response.url) {
                        // Ask for alt text
                        let altText = prompt("Enter alt text for the image:", "");

                        // Create image element with alt
                        const imgNode = $('<img>')
                            .attr('src', response.url)
                            .attr('alt', altText || '');

                        // Insert image with alt into the correct editor
                        if (editorType === 'property') {
                            $('#summernote-property').summernote('insertNode', imgNode[0]);
                        } else {
                            $('#summernote-short').summernote('insertNode', imgNode[0]);
                        }
                    }
                },
                error: function () {
                    alert('Image upload failed!');
                }
            });
        }

        // Set content on form submit
        $('form').on('submit', function () {
            $('#property_description').val($('#summernote-property').summernote('code'));
            $('#short_description').val($('#summernote-short').summernote('code'));
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const faqSection = document.getElementById('faqSection');
        const addFaqBtn = document.getElementById('addFaqBtn');

        addFaqBtn.addEventListener('click', function () {
            const faqItem = document.createElement('div');
            faqItem.classList.add('faq-item', 'border', 'rounded', 'p-3', 'mb-3');
            faqItem.innerHTML = `
                <div class="mb-2">
                    <label class="form-label">Question</label>
                    <input type="text" name="faq_question[]" class="form-control" placeholder="Enter FAQ Question">
                </div>
                <div class="mb-2">
                    <label class="form-label">Answer</label>
                    <textarea name="faq_answer[]" class="form-control" rows="3" placeholder="Enter FAQ Answer"></textarea>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
            `;
            faqSection.appendChild(faqItem);
        });

        faqSection.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-faq')) {
                e.target.parentElement.remove();
            }
        });
    });
</script>

<script>
    const chooseFile = document.getElementById("choose-file");
    const imgPreview = document.getElementById("img-preview");

    chooseFile.addEventListener("change", function () {
    getImgData();
    });

    function getImgData() {
        const files = chooseFile.files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function () {
            imgPreview.style.display = "block";
            imgPreview.innerHTML = '<img src="' + this.result + '" />';
            document.getElementById('old_image').style.display = "none";

            });    
        }
    }
</script>

<script>   
    $('#editProperty').on('submit',function(e){
        e.preventDefault();
        $.ajax({               
            url:"{{Route('updatePropertie')}}", 
            method:"POST",                             
            data:new FormData(this) ,
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $(document).find('span.error-text').text('');
            },
            success:function(data){              
                if(data.status == 0){
                    $.each(data.error,function(prefix,val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });                      
                }else{
                    swal({
                        title: data.msg,
                        text: "",
                        type: "success",
                        icon: "success",
                        showConfirmButton: true
                    }).then(function(){
                        window.location.href = "/partner/allProperties";
                    });
                        
                }
            }
        });
    }); 
 </script>

@endsection
