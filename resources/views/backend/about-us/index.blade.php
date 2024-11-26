@extends('backend.layout')

@section('content')
    <div class="container mt-10 ">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header bg-primary text-white">About Us Settings</div>

                    <div class="card-body">
                        <form action="{{ route('about-us.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Path Gambar -->
                            <div class="row">
                                <div class="col-md mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $aboutus->title ?? '') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md mb-3">
                                    <label for="path" class="form-label">Image</label>
                                    <input type="file" name="path" id="path"
                                        class="form-control @error('path') is-invalid @enderror"
                                        onchange="previewImage('path', 'pathPreview')">
                                    @error('path')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <!-- Cek jika gambar ada di database, tampilkan -->
                                    @if (isset($aboutus->path))
                                        <img id="pathPreview" src="{{ asset($aboutus->path) }}" alt="Gambar Lama"
                                            class="mt-2" style="max-width: 200px;">
                                    @else
                                        <img id="pathPreview" src="" alt="Preview Gambar" class="mt-2"
                                            style="max-width: 200px; display: none;">
                                    @endif
                                </div>
                            </div>

                            <!-- Website Name -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="overview" class="form-label">Overview</label>
                                    <!-- Removed the `value` attribute for textarea, since it's not applicable -->
                                    <textarea name="overview" class="form-control @error('overview') is-invalid @enderror" rows="4">{{ old('overview', $aboutus->overview ?? '') }}</textarea>
                                    <!-- Display validation errors if any -->
                                    @error('overview')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <!-- Use CKEditor on this textarea -->
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $aboutus->description ?? '') }}</textarea>
                                    <!-- Display validation errors if any -->
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
