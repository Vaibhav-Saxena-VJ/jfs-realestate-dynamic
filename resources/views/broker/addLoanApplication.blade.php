@extends('layouts.header')
@section('title')
    @parent
    JFS | Add Loan application
@endsection
@section('content')
@parent
<!-- Breadcrumbs -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('partnerDashboard') }}">List of Loans</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Loan Application</li>
    </ol>
</nav>
 
<!-- Begin Page Content -->
<div class="container-fluid">
    <form id="addNewProperty">
        @csrf
        <div class="container-fluid">
            
                <!-- Title -->
                <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                    <h2 class="h5 mb-3 mb-lg-0"><a href="../../pages/admin/customers.html" class="text-muted"><i class="bi bi-arrow-left-square me-2"></i></a> Add New Loan</h2>
                    <div class="hstack gap-3">
                    <button class="btn btn-light btn-sm btn-icon-text"><i class="bi bi-x"></i> <span class="text">Cancel</span></button>
                    {{-- <button type="submit" class="btn btn-primary btn-sm btn-icon-text"><i class="bi bi-save"></i> <span class="text">Save</span></button> --}}
                    <input type="submit" class="btn btn-primary btn-sm btn-icon-text" value="Save">
                    </div>
                </div>


                <input type="hidden" name="creator_id" value=" {{ Session::get('user_id') }}" />
               

                <!-- Main content -->
                <div class="row">
                    <!-- Left side -->
                    <div class="col-lg-8">
                        <!-- Basic information -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6 mb-4">Add user information </h3>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="user_name" class="form-control" placeholder="Loan applicant name" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Email ID</label>
                                            <input type="text" name="email_id" class="form-control" placeholder="Applicant Email ID" required />
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="text" name="password" class="form-control" placeholder="Applicant account password" required />
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="tel" name="mobile_number" class="form-control" placeholder="Applicant mobile number" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Carpet area</label>
                                            <input type="date" name="dob" class="form-control" placeholder="Date of Birth" required />
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="Address" required />
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" name="city" class="form-control" placeholder="City" required />
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <input type="text" name="state" class="form-control" placeholder="State" required />
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Pincode</label>
                                            <input type="text" name="pincode" class="form-control" placeholder="Pincode" required />
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                        <!-- Address -->

                        
                        <div class="card mb-4" style="padding:3%">
                            <h3 class="h6 mb-4">Loan information </h3>
                                <div class="row">
                                
                                    <div class="col-lg-6">
                                        <label class="form-label">Email ID</label>
                                        <input type="email" class="form-control jixlink2" name="email_id" placeholder="Email ID">
                                        <span class="text-danger error-text jixlink2_err"></span>
                                    </div>
                                
                                
                                    <div class="col-lg-6">
                                        <label class="form-label">Contact Number</label>
                                        <input type="tel" class="form-control jixlink2" name="contact_number" placeholder="Contact Number">
                                        <span class="text-danger error-text jixlink2_err"></span>
                                    </div>
                              
                               
                            </div>
                        </div>

                    </div>
                    <!-- Right side -->
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Property Image</h3>
                                <input class="form-control" type="file" accept=".jpg,.jpeg,.png,.webp " name="property_image" required />

                                <h3 class="h6 mt-2">Property Boucher</h3>
                                <input class="form-control" type="file" accept=".pdf" name="property_voucher" />

                            </div>
                        </div>
                        <!-- Notes -->

                        <div class="card mb-4">
                            <div class="card-body">
                                <label class="form-label">Price Range</label>
                              
                                <span class="text-danger error-text jixname2_err"></span>
                            </div>    
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                            <h3 class="h6">Amenities Description</h3>
                            <textarea class="form-control" rows="6" style="resize:none" name="amenities" placeholder="Amenities Description"></textarea>
                            </div>
                        </div>
                       
                      

                    </div>
                </div>
            </div>
        
    </form>
        
   
</div>            

            
@endsection
@section('script')
@parent

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
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


@endsection
