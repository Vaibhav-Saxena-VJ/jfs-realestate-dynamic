@extends('layouts.header')
@section('title')
@parent
Create New Blog
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
                <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">All Blogs</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Blog</li>
            </ol>
        </nav>

        <a href="{{ route('blogs.index') }}" class="btn btn-primary ms-3" ><i class="fas fa-arrow-left"></i> Back</a>
    </div>
</div>

<div class="row bg-white">
    <div class="col-12 grid-margin">
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-8 py-4 px-5">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif                   

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Blog Category</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Blog Status</label>
                            <select name="status" class="form-control">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Choose Date:</label>
                            <input type="date" class="form-control" name="published_date" value="{{ isset($blog->published_at) ? \Carbon\Carbon::parse($blog->published_at)->format('Y-m-d') : '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="is_featured" value="1"> Featured Blog
                        </label>
                    </div>

                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="latest" value="1"> Mark as Latest
                        </label>
                    </div>
                    <div class="mb-3">
                        <label>Blog Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Blog Description</label>
                        <textarea name="description" class="form-control" id="editor">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="col-md-4 py-4 px-4 bg-light">
                    <div class="mb-3">
                        <label>Blog Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                    </div>

                    <div class="mb-3">
                        <label>Meta Keywords</label>
                        <input type="text" name="meta_keyword" class="form-control" value="{{ old('meta_keyword') }}">
                    </div>

                    <div class="mb-3">
                        <label>Meta Description</label>
                        <textarea name="meta_description" class="form-control">{{ old('meta_description') }}</textarea>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary ms-3">Create Blog</button>
                    </div>
                </div>
            </div>
        </form>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>

        <!-- Initialize TinyMCE -->
        <script>
            tinymce.init({
            selector: '#editor',
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help',
            toolbar: 'undo redo | fontselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview code',
            height: 400,
            menubar: true,
            branding: false,

            images_upload_url: '/upload-image',
            automatic_uploads: false,
            images_reuse_filename: true,
            paste_data_images: false,

            images_upload_handler: function (blobInfo, success, failure) {
            let formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            // Get CSRF token
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            formData.append('_token', csrfToken);

            fetch('/upload-image', {
            method: 'POST',
            body: formData
            })
            .then(response => response.json())
            .then(result => {
            if (result.location) {
            let cleanUrl = result.location.replace(/^.*?:\/\//, ''); // Removes http:// or https:// if needed
            success(cleanUrl);
            } else {
            failure('Image upload failed');
            }
            })
            .catch(error => {
            console.error('Upload error:', error);
            failure('Image upload failed');
            });
            }
            });
        </script>
    </div>
</div>
@endsection
