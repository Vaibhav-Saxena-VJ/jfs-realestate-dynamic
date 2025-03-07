@extends('layouts.header')
@section('title')
All Users
@endsection
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">All Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
    </ol>
</nav>

<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css" rel="stylesheet"/>

<!-- export button -->
<link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet"/>

<div style="padding: 1%"> 
            <h1><center>System Users</center></h1> 
                 <!-- DataTales Example -->
                 <div class="card shadow mb-4">                 
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <!-- <div class="card-header py-3">
                           <h4>Edit User
                                <a href="{{url('admin/users')}}" class="btn btn-danger float-end">Back</a> 
                           </h4>
                        </div> -->
                        <div class="card-body">
                            <form action="{{url('admin/users/' .$user->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="">User Name</label>
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control" />                                    
                                </div>
                                <div class="mb-3">
                                    <label for="">User Email</label>
                                    <input type="email" name="email_id" value="{{$user->email_id}}" readonly class="form-control" />                                       
                                </div>
                                <div class="mb-3">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" />                                    
                                </div>
                                <div class="mb-3">
                                    <!-- <label for="">Roles</label>
                                    <select name="roles[]" class="form-control" multiple> 
                                        <option value="">Select Role</option>  
                                        @foreach ($roles as $role)
                                         <option value="{{ $role }}">{{ $role }}</option>   
                                        @endforeach   
                                    </select>                               -->
                                    <label for="password">Assign Roles</label>
                                <select name="roles[]" id="roles" class="form-control select2" multiple>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role}}"{{ in_array($role, $userRoles) ? 'selected':'' }}>{{ $role}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>                                
                                </div>
                            </form>
                        </div>                
                </div>
</div>     
            


   
   

@endsection

@section('script')

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