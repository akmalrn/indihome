@extends('backend.layout')

@section('content')
    <div class="container mt-10 ">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header bg-primary text-white">Why Us Settings</div>

                    <div class="card-body">
                        <form action="{{ route('why-us.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Path Gambar -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $whyus->title ?? '') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="path" class="form-label">Image</label>
                                    <input type="file" name="path"
                                        class="form-control @error('path') is-invalid @enderror"
                                        value="{{ old('path', $whyus->path ?? '') }}">
                                    @error('path')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img id="pathPreview" src="#" alt="Image Preview" class="img-thumbnail mt-2"
                                        style="display: none; width: 50px;">
                                    @if (!empty($whyus) && !empty($whyus->path))
                                        <img src="{{ asset('uploads/whyus/' . $whyus->path) }}" alt="Why Us"
                                            class="img-fluid rounded shadow">
                                    @else
                                        <!-- Tidak ada gambar untuk ditampilkan -->
                                    @endif


                                </div>
                            </div>

                            <div class="col mb-3">
                                <label for="overview" class="form-label">Overview</label>
                                <input type="text" name="overview"
                                    class="form-control @error('overview') is-invalid @enderror"
                                    value="{{ old('overview', $whyus->overview ?? '') }}">
                                @error('overview')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <!-- Use CKEditor on this textarea -->
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                        rows="4">{{ old('description', $whyus->description ?? '') }}</textarea>
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
