@extends('backend.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Create New Area</h3>
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
                        <a href="{{ route('categories-services.index') }}">Area</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Create</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create New Area</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('categories-services.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col" class="form-group">
                                        <label for="path">Image</label>
                                        <input type="file" name="path" id="path" class="form-control"
                                            @error('path') is-invalid @enderror required>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="category">Area</label>
                                            <input id="category" type="text" class="form-control" name="category"
                                                placeholder="Enter slider category" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('categories-services.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
