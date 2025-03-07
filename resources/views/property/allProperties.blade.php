@extends('layouts.header')
@section('title')
@parent
JFS | Add Property
@endsection
@section('content')

@section('content')
@parent
<div class="card-header py-3">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="d-flex align-items-center">
            <ol class="breadcrumb m-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('partnerDashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Properties</li>
            </ol>
        </nav>
        <!-- Add User Button -->
        <a class="btn btn-primary"  href="{{ route('addProperty') }}" ><i class="fa fa-plus"></i>  Add Propertie</a>
    </div>
</div>

<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css" rel="stylesheet"/>

<!-- export button -->
<link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet"/>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive" id="user_table">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Property Type</th>
                        <th>Builder Name</th>
                        <th>BHK Details</th>
                        <th>Address</th>
                        <th>Price</th>
                        <th>Featured</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['allProperties'] as $p)
                    <tr>
                        <td>{{$p->title}}</td>
                        <td>{{ $p->category_name }}</td>
                        <td>{{$p->builder_name}}</td>
                        <td>{{$p->select_bhk}} BHK</td>
                        <td>{{$p->address}}</td>
                        <td>{{$p->from_price}} to {{$p->to_price}}</td>
                        <td>
                            <input type="checkbox" class="toggle-featured"
                                data-id="{{ $p->properties_id }}"
                                {{ $p->is_featured ? 'checked' : '' }}>
                        </td>
                        <td>
                            <a class="btn btn-primary btn-xs eye" title="ViewDetails" href="{{ url('viewDetails/'.$p->properties_id) }}"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-primary btn-xs edit" title="Edit" href="{{ url('editProperty/'.$p->properties_id) }}"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-danger btn-xs delete" title="Delete" onclick="deleteProperty('{{$p->properties_id}}')"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right">
                {{ $data['allProperties']->links() }}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addPartnerView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Channel Partner</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="user" id="addPartner" method="post">
                @csrf   
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="recipient-name" class="col-form-label">Email ID:</label>
                        <input type="email" class="form-control" id="email_id" name="email_id" required>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="recipient-name" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>    
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="recipient-name" class="col-form-label">Mobile Number:</label>
                        <input type="tel" class="form-control" id="mobile_no" name="mobile_no" required>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="recipient-name" class="col-form-label">Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="recipient-name" class="col-form-label">Address:</label>
                        <input type="tel" class="form-control" id="address" name="address">
                    </div>
                </div>            
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="recipient-name" class="col-form-label">City:</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="recipient-name" class="col-form-label">State:</label>
                        <input type="text" class="form-control" id="state" name="state" >
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="recipient-name" class="col-form-label">Pincode:</label>
                        <input type="text" class="form-control" id="pincode" name="pincode">
                    </div>
                </div>    
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>          
@endsection

@section('script')
@parent
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.js"></script>


<!--export button -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

<script>
    $(document).ready( function () {
        $('#example').DataTable();
    } );
</script>

<script>   
    $('#addPartner').on('submit',function(e){
        e.preventDefault();
        $.ajax({               
            url:"{{Route('insertPartner')}}", 
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
                    $('#addPartner').get(0).reset();   
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
    $(document).ready(function() {
        $('#example').DataTable();

        $('.toggle-featured').change(function() {
            var propertyId = $(this).data('id');
            var isFeatured = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('toggleFeatured') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    property_id: propertyId,
                    is_featured: isFeatured
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                    } else {
                        alert("Failed to update. Try again!");
                    }
                },
                error: function() {
                    alert("An error occurred!");
                }
            });
        });
    });
</script>

@endsection