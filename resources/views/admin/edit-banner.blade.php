@extends('layouts.header')
@section('title')
@parent
Edit Property Banner
@endsection
@section('content')

@parent
<!-- Breadcrumbs and Search Bar -->
<div class="card-header py-3">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="d-flex align-items-center">
            <ol class="breadcrumb m-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Banners</li>
            </ol>
        </nav>
    </div>
</div>


<div class="row bg-white p-3 g-3">
    <div class="col-md-6">
        <div class="card-body">
            <!-- Edit Form -->
            <form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Banner Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $banner->title }}">
                </div>

                <div class="mb-3">
                    <label>Current Image</label><br>
                    <img src="{{ asset('storage/' . $banner->image) }}" width="150">
                </div>

                <div class="mb-3">
                    <label>Upload New Image (Optional)</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Update Banner</button>
            </form>
        </div>
    </div>
</div>
@endsection
