@extends('backend.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Blog</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blogs.index') }}">Blog</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Blog</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Image Input -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="category_id">Category</label>
                                            <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                                <option value="">Select Category</option>
                                                @foreach ($categoryblogs as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? 'selected' : '' }}>
                                                        {{ $category->category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="path">Upload Image</label>
                                            <input id="path" type="file" class="form-control @error('path') is-invalid @enderror" name="path" onchange="previewImage('path', 'pathPreview')">
                                            @error('path')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                            <!-- Current image preview -->
                                            @if ($blog->path)
                                                <div class="mt-2">
                                                    <img src="{{ asset('uploads/blogs/' . $blog->path) }}" alt="Current blog Image" class="img-thumbnail" width="200">
                                                </div>
                                            @endif
                                            <img id="pathPreview" src="#" alt="Image Preview" class="img-thumbnail mt-2" style="display: none; width: 200px;">
                                        </div>
                                    </div>
                                </div>

                                <!-- Title Input -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="title">Title</label>
                                            <input id="title" type="text" class="form-control" name="title" value="{{ $blog->title }}" required>
                                        </div>
                                    </div>

                                    <!-- Overview Input -->
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="overview">Overview</label>
                                            <input id="overview" type="text" class="form-control" name="overview" value="{{ $blog->overview }}" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Description Input -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="form-control" name="description" rows="4">{{ $blog->description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Keywords Input -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="keywords">Keywords</label>
                                            <textarea id="keywords" class="form-control @error('keywords') is-invalid @enderror" name="keywords">{{ old('keywords', $blog->keywords) }}</textarea>
                                            @error('keywords')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                    <!-- Descriptions textarea -->
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="descriptions">Descriptions</label>
                                            <textarea id="descriptions" class="form-control @error('descriptions') is-invalid @enderror" name="descriptions">{{ old('descriptions', $blog->descriptions) }}</textarea>
                                            @error('descriptions')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('blogs.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
