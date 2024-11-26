@extends('backend.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Service</h3>
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
                        <a href="{{ route('services.index') }}">Service</a>
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
                            <h4 class="card-title">Edit Service</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('services.update', $service->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Image Input -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="category_id">Category</label>
                                            <select id="category_id" name="category_id"
                                                class="form-control @error('category_id') is-invalid @enderror" required>
                                                <option value="">Select Category</option>
                                                @foreach ($categoryservice as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $service->category_id ? 'selected' : '' }}>
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
                                            <label for="type_id">Category</label>
                                            <select id="type_id" name="type_id"
                                                class="form-control @error('type_id') is-invalid @enderror" required>
                                                <option value="">Select Category</option>
                                                @foreach ($typeservices as $type)
                                                    <option value="{{ $category->id }}"
                                                        {{ $type->id == $service->type_id ? 'selected' : '' }}>
                                                        {{ $type->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('type_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Title Input -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="title">Title</label>
                                            <input id="title" type="text" class="form-control" name="title"
                                                value="{{ $service->title }}" required>
                                        </div>
                                    </div>

                                    <!-- Overview Input -->
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="overview">Overview</label>
                                            <input id="overview" type="text" class="form-control" name="overview"
                                                value="{{ $service->overview }}" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Description Input -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="form-control" name="description" rows="4" required>{{ $service->description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Category Input -->


                                <!-- Buttons -->
                                <div class="d-flex justify-content-end">
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
