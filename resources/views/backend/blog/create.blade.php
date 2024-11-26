@extends('backend.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Create New Blog</h3>
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
                        <a href="{{ route('blogs.index') }}">Blog</a>
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
                            <h4 class="card-title">Create New Blog</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="category_id">Category</label>
                                            <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                                <option value="">Select Category</option>
                                                @foreach($categoryblog as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="path">Upload Image</label>
                                            <input type="file" name="path" id="path" class="form-control @error('path') is-invalid @enderror" onchange="previewImage('path', 'pathPreview')" required>
                                            @error('path')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!-- Tempat gambar pratinjau -->
                                        <img id="pathPreview" src="#" alt="Image Preview" class="img-thumbnail mt-2" style="display: none; width: 200px;">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="title">Title</label>
                                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter blog title" required>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="overview">Overview</label>
                                            <input id="overview" type="text" class="form-control @error('overview') is-invalid @enderror" name="overview" placeholder="Enter blog overview" required>
                                            @error('overview')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter blog description" rows="4"></textarea>
                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="keywords">Meta Keywords</label>
                                            <textarea id="keywords" class="form-control @error('keywords') is-invalid @enderror" name="keywords" placeholder="Enter keywords" rows="4"></textarea>
                                            @error('keywords')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="descriptions">Meta Description</label>
                                            <textarea id="descriptions" class="form-control @error('descriptions') is-invalid @enderror" name="descriptions" placeholder="Enter meta description" rows="4"></textarea>
                                            @error('descriptions')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('blogs.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
