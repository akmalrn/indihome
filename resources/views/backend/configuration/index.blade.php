@extends('backend.layout')

@section('content')
    <div class="container mt-10 ">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header bg-primary text-white">Configuration Settings</div>

                    <div class="card-body">
                        <form action="{{ route('configuration.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Path Gambar -->
                            <div class="row">
                                <!-- Path Gambar -->
                                <div class="col-md mb-3">
                                    <label for="path" class="form-label">Website Image</label>
                                    <input type="file" name="path" id="path"
                                        class="form-control @error('path') is-invalid @enderror"
                                        onchange="previewImage('path', 'pathPreview')">
                                    @error('path')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <!-- Cek jika gambar ada di database, tampilkan -->
                                    @if (isset($configuration->path))
                                        <img id="pathPreview" src="{{ asset($configuration->path) }}" alt="Gambar Lama"
                                            class="mt-2" style="max-width: 200px;">
                                    @else
                                        <img id="pathPreview" src="" alt="Preview Gambar" class="mt-2"
                                            style="max-width: 200px; display: none;">
                                    @endif
                                </div>

                                <!-- Path Logo -->
                                <div class="col-md mb-3">
                                    <label for="path_logo" class="form-label">Title Image</label>
                                    <input type="file" name="path_logo" id="path_logo"
                                        class="form-control @error('path_logo') is-invalid @enderror"
                                        onchange="previewImage('path_logo', 'pathLogoPreview')">
                                    @error('path_logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <!-- Cek jika logo ada di database, tampilkan -->
                                    @if (isset($configuration->path_logo))
                                        <img id="pathLogoPreview" src="{{ asset($configuration->path_logo) }}"
                                            alt="Logo Lama" class="mt-2" style="max-width: 200px;">
                                    @else
                                        <img id="pathLogoPreview" src="" alt="Preview Logo" class="mt-2"
                                            style="max-width: 200px; display: none;">
                                    @endif
                                </div>
                            </div>

                            <!-- Website Name -->
                            <div class="row">
                                <div class="col-md mb-3">
                                    <label for="website_name" class="form-label">Website Name</label>
                                    <input type="text" name="website_name"
                                        class="form-control @error('website_name') is-invalid @enderror"
                                        value="{{ old('website_name', $configuration->website_name ?? '') }}">
                                    @error('website_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $configuration->title ?? '') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md mb-3">
                                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                    <textarea name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror">{{ old('meta_keywords', $configuration->meta_keywords ?? '') }}</textarea>
                                    @error('meta_keywords')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md mb-3">
                                    <label for="meta_descriptions" class="form-label">Meta Descriptions</label>
                                    <textarea name="meta_descriptions" class="form-control @error('meta_descriptions') is-invalid @enderror">{{ old('meta_descriptions', $configuration->meta_descriptions ?? '') }}</textarea>
                                    @error('meta_descriptions')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md mb-3">
                                <label for="footer" class="form-label">Footer</label>
                                <input type="text" name="footer"
                                    class="form-control @error('footer') is-invalid @enderror"
                                    value="{{ old('footer', $configuration->footer ?? '') }}">
                                @error('footer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md mb-3">
                                <label for="path_services" class="form-label">services Image (Home)</label>
                                <input type="file" name="path_services" id="path_services"
                                    class="form-control @error('path_services') is-invalid @enderror"
                                    onchange="previewImage('path_services', 'path_servicesPreview')">
                                @error('path_services')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <!-- Cek jika gambar ada di database, tampilkan -->
                                @if (isset($configuration->path_services))
                                    <img id="path_servicesPreview" src="{{ asset($configuration->path_services) }}"
                                        alt="Gambar Lama" class="mt-2" style="max-width: 200px;">
                                @else
                                    <img id="path_servicesPreview" src="" alt="Preview Gambar" class="mt-2"
                                        style="max-width: 200px; display: none;">
                                @endif
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="path_1" class="form-label">About Image (Home)</label>
                                    <input type="file" name="path_1" id="path_1"
                                        class="form-control @error('path_1') is-invalid @enderror"
                                        onchange="previewImage('path_1', 'path_1Preview')">
                                    @error('path_1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <!-- Cek jika gambar ada di database, tampilkan -->
                                    @if (isset($configuration->path_1))
                                        <img id="path_1Preview" src="{{ asset($configuration->path_1) }}"
                                            alt="Gambar Lama" class="mt-2" style="max-width: 200px;">
                                    @else
                                        <img id="path_1Preview" src="" alt="Preview Gambar" class="mt-2"
                                            style="max-width: 200px; display: none;">
                                    @endif
                                </div>

                                <div class="col mb-3">
                                    <label for="overview_1" class="form-label">Overview</label>
                                    <input type="text" name="overview_1"
                                        class="form-control @error('overview_1') is-invalid @enderror"
                                        value="{{ old('overview_1', $configuration->overview_1 ?? '') }}">
                                    @error('overview_1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col mb-3">
                                    <label for="description_1" class="form-label">Description</label>
                                    <input type="text" name="description_1"
                                        class="form-control @error('description_1') is-invalid @enderror"
                                        value="{{ old('description_1', $configuration->description_1 ?? '') }}">
                                    @error('description_1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col mb-3">
                                    <label for="price_1" class="form-label">Price</label>
                                    <input type="text" name="price_1"
                                        class="form-control @error('price_1') is-invalid @enderror"
                                        value="{{ old('price_1', $configuration->price_1 ?? '') }}">
                                    @error('price_1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Tambahkan input lainnya sesuai kebutuhan -->

                            <!-- Tombol Submit -->
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
