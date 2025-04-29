@extends('layouts.header')
@section('title')
    @parent
    JFS | Add Property
@endsection
@section('content')
@parent
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">

<form id="addNewProperty">
    @csrf
    <div class="card-header py-3">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="d-flex align-items-center">
                <ol class="breadcrumb m-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Property</li>
                </ol>
            </nav>

            <div class="hstack gap-3">
                <button class="btn btn-light border btn-icon-text"><i class="bi bi-x"></i> <span class="text">Cancel</span></button>
                {{-- <button type="submit" class="btn btn-primary btn-icon-text"><i class="bi bi-save"></i> <span class="text">Save</span></button> --}}
                <input type="submit" class="btn btn-primary btn-icon-text" value="Save">
            </div>
        </div>
    </div>

    <input type="hidden" name="creator_id" value=" {{ Session::get('user_id') }}" />
    <!-- Main content -->
    <div class="row bg-white">
        <!-- Left side -->
        <div class="col-lg-9 p-5">
            <!-- Basic information -->
            <div class="">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Builder Name</label><span class="text-danger">*</span>
                            <input type="text" name="builder_name" class="form-control" placeholder="Builder Name" required />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Project Name</label><span class="text-danger">*</span>
                            <input type="text" name="property_title" class="form-control" placeholder="Property Title" required />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Land Type</label><span class="text-danger">*</span>
                            <select class="form-control" name="property_type" id="propertyType">
                                <option value="">Select Property Type</option>
                                <?php foreach($data['category'] as $v) { ?>
                                    <option value="<?php echo $v->pid; ?>"><?php echo $v->category_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Property Type</label><span class="text-danger">*</span>
                            <select class="form-control" name="land_type" id="landType">
                                <option value="">Select Type</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Starting Price</label><span class="text-danger">*</span>
                            <input type="text" name="s_price" class="form-control" placeholder="Starting Price" required />
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Carpet area</label>
                            <input type="text" name="area" class="form-control" placeholder="Carpet Area"  />
                        </div>
                    </div>

                    <div class="col-lg-3"> 
                        <div class="mb-3">
                            <label class="form-label">Built-up Area</label>
                            <input type="text" name="builtup_area" class="form-control" placeholder="Built-up Area" />
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Select BHK</label>
                            <select class="form-control" name="select_bhk">
                                <option>Select BHK</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="2 & 3">2 & 3</option>
                                <option value="2, 3 & 4">2, 3 & 4</option>
                                <option value="3 & 4">3 & 4</option>
                                <option value="3, 4 & 5">3, 4 & 5</option>
                            </select> 
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Bedrooms</label>
                            <select class="form-control" name="beds">
                                <option>Select beds</option>
                                <option value="No">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select> 
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Bathrooms</label>
                            <select class="form-control" name="baths">
                                <option>Select baths</option>
                                <option value="No">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>                                                
                            </select> 
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Balconies</label>
                            <select class="form-control" name="balconies">
                                <option>Select balconies</option>
                                <option value="No">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>                                                
                            </select> 
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Parking</label>
                            <select class="form-control" name="parking">
                                <option>Select parking</option>
                                <option value="No">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>                                                
                            </select> 
                        </div>  
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Property Description</label>
                            <textarea name="property_description" id="summernote-property" class="form-control" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Short Description</label>
                            <textarea name="short_description" id="summernote-short" class="form-control" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Property Address</label>
                            <input type="text" name="property_address" class="form-control" placeholder="Full Address" required />
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Area in City</label>
                            <select name="localitie" class="form-control" required>
                                <option value="">Select Locality</option>
                                @foreach($data['localities'] as $locality)
                                    <option value="{{ $locality->id }}">{{ $locality->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">City</label><span class="text-danger">*</span>
                            <input type="text" name="city" class="form-control" placeholder="City" required />
                        </div>
                    </div>

                    <!-- Latitude -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Latitude</label>
                            <input type="text" name="latitude" class="form-control" placeholder="Ex: 1.462260" >
                            <small><a class="form-hint" href="https://www.latlong.net/" target="_blank" rel="nofollow"> Go here to get Latitude from address.</a></small>
                        </div>
                    </div>
                    
                    <!-- Longitude -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Longitude</label>
                            <input type="text" name="longitude" class="form-control" placeholder="Ex: 1.462260">
                            <small><a class="form-hint" href="https://www.latlong.net/" target="_blank" rel="nofollow"> Go here to get Longitude from address.</a></small>
                        </div>
                    </div>

                    <!-- Nearby Location 1 -->
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Location Advantages</label>
                            <input type="text" name="nearby[]" class="form-control mb-2" placeholder="example Lexicon - 02 km" >
                            <input type="text" name="nearby[]" class="form-control mb-2" placeholder="example Lexicon - 02 km" >
                            <input type="text" name="nearby[]" class="form-control mb-2" placeholder="example Lexicon - 02 km" >
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label text-white invisible">xyz</label>
                            <input type="text" name="nearby[]" class="form-control mb-2" placeholder="example Lexicon - 02 km" >
                            <input type="text" name="nearby[]" class="form-control mb-2" placeholder="example Lexicon - 02 km" >
                            <input type="text" name="nearby[]" class="form-control mb-2" placeholder="example Lexicon - 02 km" >
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label text-white invisible">xyz</label>
                            <input type="text" name="nearby[]" class="form-control mb-2" placeholder="example Lexicon - 02 km" >
                            <input type="text" name="nearby[]" class="form-control mb-2" placeholder="example Lexicon - 02 km" >
                            <input type="text" name="nearby[]" class="form-control mb-2" placeholder="example Lexicon - 02 km" >
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Email ID</label>
                            <input type="email" class="form-control jixlink2" name="email_id" placeholder="Email ID">
                            <span class="text-danger error-text jixlink2_err"></span>
                        </div>
                    </div>
                
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="tel" class="form-control jixlink2" name="contact_number" placeholder="Contact Number">
                            <span class="text-danger error-text jixlink2_err"></span>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Schema Markup / Open Graph Meta / Twitter Card Meta</label>
                            <textarea name="schema_markup" id="schema_markup" class="form-control" placeholder="Add Your Schema" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">FAQs</label>
                            <div id="faqSection">
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
                            </div>
                            <button type="button" class="btn btn-primary btn-sm mt-2" id="addFaqBtn">Add More FAQ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right side -->
        <div class="col-lg-3 bg-light p-4">
            <div class=" mb-4">
                <!-- Multiple Property Images Upload -->
                <h3 class="h6"><strong>Property Images<span class="text-danger">*</span></strong></h3>
                <input class="form-control" type="file" accept=".jpg,.jpeg,.png,.webp" name="property_images[]" multiple required />
                <small class="text-muted">You can upload multiple images (JPG, JPEG, PNG, WEBP).</small>

                <!-- Property Boucher Upload -->
                <h3 class="h6 mt-2"><strong>Property Brochure<span class="text-danger">*</span></strong></h3>
                <input class="form-control" type="file" accept=".pdf" name="property_voucher" />
                <small class="text-muted">Upload the property brochure in PDF format.</small>
            </div>
            <div class=" mb-4">
                <div class="form-group">
                    <label for="slug">Slug (URL)</label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter Slug" required maxlength="100">
                </div>
                <div class="form-group">
                    <label for="meta_title"><strong>Meta Title</strong></label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter Meta Title">
                </div>
                <div class="form-group">
                    <label for="meta_description"><strong>Meta Description</strong></label>
                    <textarea class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description"></textarea>
                </div>

                <div class="form-group">
                    <label for="meta_keywords"><strong>Meta Keywords</strong></label>
                    <textarea class="form-control" name="meta_keywords" id="meta_keywords" placeholder="Enter Meta Keywords (comma separated)"></textarea>
                </div>
            </div>
            <!-- Notes -->

            <div class="mb-4">
                <label class="form-label"><strong>Price Range</strong></label><span class="text-danger">*</span>
                <select name="price_range" class="form-control">
                        <?php
                        foreach($data['range'] as $v) {  
                            $range_amount = $v->from_price. " to ". $v->to_price;
                            ?>
                            <option value="<?php echo $v->range_id; ?>"><?php echo $range_amount; ?></option>     
                        <?php 
                        }
                        ?>
                </select>    
                <span class="text-danger error-text jixname2_err"></span>   
            </div>
            
            <div class="mb-3">
                <label class="form-label"><strong>Property Status</strong></label>
                <select name="property_status" class="form-control" required>
                    <option value="">Select Status</option>
                    @foreach($data['property_status'] as $status)
                        <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                    @endforeach
                </select>
            </div>
                  
            <div class="mb-4">
                <label class="form-label"><strong>Rera No.</strong></label><span class="text-danger">*</span>
                <input type="text" name="rera" class="form-control" placeholder="Ex: P5XXXXXXXX14" required />
                <span class="text-danger error-text jixname2_err"></span>   
            </div>    
                                                    

            <div class=" mb-4">
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
</form>       
                    
@endsection
@section('script')
@parent

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
$('#addNewProperty').on('submit',function(e){
    e.preventDefault();
    $.ajax({               
        url:"{{Route('insertProperty')}}", 
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
                    swal("Oh noes!", val[0], "error");
                });                      
            }else if(data.status == 2){
                document.getElementById("skill_title_error["+data.id+"]").innerHTML =data.msg;
                // console.log(data); console.log('skill_title_error['+data.id+']');
                // return false;
            }else{
                $('#addNewProperty').get(0).reset();   
                swal({
                    title: data.msg,
                    text: "",
                    type: "success",
                    icon: "success",
                    showConfirmButton: true
                }).then(function(){
                    location.reload();
                });
                    
            }
        }
    });
}); 

function deletePropertie(id)
	{
		$.ajax({
            url:"{{Route('deletePropertie')}}", 
            type: 'post',
            dataType: 'json',
            data: {
                'propertie_id': id,               
                '_token': '{{ csrf_token() }}',
                },
            success: function (response) {
                // console.log(response);
                if(response.status == 0){
                    swal({
                        title: response.error,
                        text: "",
                        type: "success",
                        icon: "success",
                        showConfirmButton: true
                    }).then(function(){ 
                        location.reload();
                    });
                }else{
                    swal({
                        title: response.msg,
                        text: "",
                        type: "success",
                        icon: "success",
                        showConfirmButton: true
                    }).then(function(){ 
                        location.reload();
                    });
                }                           
            }
        });      
	}

</script>
<script>
    document.getElementById('propertyType').addEventListener('change', function() {
        var propertyTypeId = this.value; // Now stores ID instead of category name
        var landTypeDropdown = document.getElementById('landType');
        landTypeDropdown.innerHTML = ''; // Clear existing options

        var defaultOption = document.createElement("option");
        defaultOption.text = "Select Type";
        defaultOption.value = "";
        landTypeDropdown.appendChild(defaultOption);

        // Mapping property category IDs to land type options
        var landTypeOptions = {
            1: ['Plot', 'Flat', 'Bungalow', 'Villa'], // Example: Residential (pid = 1)
            2: ['Office', 'Shop', 'Showroom'], // Example: Commercial (pid = 2)
            3: ['Plot', 'Flat']
        };

        if (landTypeOptions.hasOwnProperty(propertyTypeId)) {
            landTypeOptions[propertyTypeId].forEach(function(type) {
                var option = document.createElement("option");
                option.text = type;
                option.value = type;
                landTypeDropdown.appendChild(option);
            });
        }
    });
</script>
@endsection
