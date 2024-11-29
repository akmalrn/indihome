@extends('backend.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Category</h3>
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
                        <a href="{{ route('services.index') }}">Category</a>
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
                            <h4 class="card-title">Edit Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('categories-services.update', $categoryservice->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Title Input -->
                                <div class="row">
                                    <!-- Image Input -->
                                    <div class="col-md-6 form-group">
                                        <label for="path">Image</label>
                                        <input type="file" name="path" id="path" class="form-control @error('path') is-invalid @enderror">
                                        @error('path')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <!-- Display Existing Image if Available -->
                                        @if ($categoryservice->path)
                                            <div class="mt-2">
                                                <img src="{{ asset('uploads/services/'. $categoryservice->path) }}" alt="Category Image" class="img-fluid" width="150">
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Category Input -->
                                    <div class="col-md-6 form-group">
                                        <label for="category">Area</label>
                                        <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" placeholder="Enter slider category" value="{{ old('category', $categoryservice->category) }}" required>
                                        @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Buttons -->
                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('services.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
