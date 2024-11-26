@extends('backend.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Superiority</h3>
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
                        <a href="{{ route('superiority.index') }}">Superiority</a>
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
                            <h4 class="card-title">Edit Superiority</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('superiority.update', $superiority->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Icon Input -->
                                <div class="row">
                                    <div class="col mb-4">
                                        <div class="form-group form-group-default">
                                            <label for="icon">Class Icon</label>
                                            <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $superiority->icon) }}">
                                            @error('icon')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Title Input -->
                                    <div class="col mb-4">
                                        <div class="form-group form-group-default">
                                            <label for="title">Title</label>
                                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter superiority title" value="{{ old('title', $superiority->title) }}" required>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Description Input -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="4" required>{{ old('description', $superiority->description) }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('superiority.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
