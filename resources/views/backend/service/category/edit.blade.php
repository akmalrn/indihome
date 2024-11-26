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
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="category">Category</label>
                                            <input id="category" type="text" class="form-control" name="category" value="{{ $categoryservice->category }}" required>
                                        </div>
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
