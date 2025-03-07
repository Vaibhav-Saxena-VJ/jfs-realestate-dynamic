@extends('layouts.header')
@section('title')
@parent
Add Property Banners
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
                <li class="breadcrumb-item active" aria-current="page">Manage Banners</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row bg-white p-3 g-3">
    <div class="col-md-6">
        <div class="card-body">
            <!-- Upload Form -->
            <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Banner Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Banner Image (Size: 1520 x 328px)</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Upload Banner</button>
            </form>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-body">
            <!-- Display Existing Banners -->
            <h3>Existing Banners</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($banners as $banner)
                        <tr>
                            <td>
                                <img src="{{ Storage::url($banner->image) }}" width="100">
                            </td>
                            <td>{{ $banner->title }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-warning"><i class="far fa-edit"></i></a>

                                <!-- Delete Form -->
                                <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this banner?');">
                                    @csrf
                                    @method('DELETE') <!-- Laravel DELETE request -->
                                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
