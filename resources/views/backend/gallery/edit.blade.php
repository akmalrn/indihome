@extends('backend.layout')

@section('content')

    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit gallery</h3>
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
                        <a href="{{ route('gallery.index') }}">gallery</a>
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
                            <h4 class="card-title">Edit gallery</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
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
                                            @if($gallery->path)
                                                <div class="mt-2">
                                                    <img src="{{ asset($gallery->path) }}" alt="Current gallery Image" class="img-thumbnail" width="200">
                                                </div>
                                            @endif
                                            <!-- Tempat pratinjau gambar baru yang dipilih -->
                                            <img id="pathPreview" src="#" alt="Image Preview" class="img-thumbnail mt-2" style="display: none; width: 200px;">
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('gallery.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
