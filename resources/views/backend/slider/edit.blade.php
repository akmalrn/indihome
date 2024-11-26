@extends('backend.layout')

@section('content')

    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Slider</h3>
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
                        <a href="{{ route('slider.index') }}">Slider</a>
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
                            <h4 class="card-title">Edit Slider</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Image Input -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="path">Upload Image</label>
                                            <!-- Input file untuk gambar baru -->
                                            <input id="path" type="file" class="form-control @error('path') is-invalid @enderror" name="path" onchange="previewImage('path', 'pathPreview')">
                                            @error('path')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                            <!-- Pratinjau gambar lama jika ada -->
                                            @if($slider->path)
                                                <div class="mt-2">
                                                    <img src="{{ asset('uploads/sliders/' . $slider->path) }}" alt="Current Slider Image" class="img-thumbnail" width="200">
                                                </div>
                                            @endif
                                            <!-- Tempat pratinjau gambar baru yang dipilih -->
                                            <img id="pathPreview" src="#" alt="Image Preview" class="img-thumbnail mt-2" style="display: none; width: 200px;">
                                        </div>
                                    </div>
                                </div>

                                <!-- Title Input -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="title">Title</label>
                                            <input id="title" type="text" class="form-control" name="title" value="{{ $slider->title }}" required>
                                        </div>
                                    </div>

                                    <!-- Overview Input -->
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="overview">Overview</label>
                                            <input id="overview" type="text" class="form-control" name="overview" value="{{ $slider->overview }}" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Description Input -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="form-control" name="description" rows="4" required>{{ $slider->description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('slider.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
