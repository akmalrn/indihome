@extends('backend.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">DataTables</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Datatables</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Add Row</h4>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <form action="{{ route('services.index') }}" method="GET">
                                        <select name="category_id" class="form-control" onchange="this.form.submit()">
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categoryservices as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ request()->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                    <button class="btn btn-primary btn-round"
                                        onclick="window.location.href='{{ route('type-services.index') }}'">
                                        <i class="fa fa-plus"></i> Type Service
                                    </button>
                                    <button class="btn btn-primary btn-round"
                                        onclick="window.location.href='{{ route('services.create') }}'">
                                        <i class="fa fa-plus"></i> Add Service
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Title</th>
                                            <th>Overview</th>
                                            <th>Description</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Jenis</th>
                                            <th>Judul</th>
                                            <th>Ringkasan</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <tr>
                                                <td>{{ $service->type->title }}</td>
                                                <td>{{ $service->title }}</td>
                                                <td>{{ $service->overview }}</td>
                                                <td>{!! Str::limit($service->description, 50) !!}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <form action="{{ route('services.edit', $service->id) }}"
                                                            method="GET" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" data-bs-toggle="tooltip"
                                                                title="Edit Task" class="btn btn-link btn-primary">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('services.destroy', $service->id) }}"
                                                            method="POST" id="delete-form-{{ $service->id }}"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" data-bs-toggle="tooltip"
                                                                title="Delete Task" class="btn btn-link btn-danger"
                                                                onclick="confirmDelete({{ $service->id }})">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <button class="btn btn-primary btn-round ms-auto"
                                    onclick="window.location.href='{{ route('categories-services.create') }}'">
                                    <i class="fa fa-plus"></i> Add Categories services
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td>Img</td>
                                            <th>Area</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Daerah</th>
                                            <th>Aksi</th>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($categoryservices as $category)
                                            <tr>
                                                <td> <img src="{{ asset('uploads/services/' . $category->path) }}"
                                                    alt="{{ $category->category }}"
                                                    class="img-fluid rounded"
                                                    style="max-width: 100px; height: auto;"></td>
                                                <td>{{ $category->category }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <form
                                                            action="{{ route('categories-services.edit', $category->id) }}"
                                                            method="GET" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" data-bs-toggle="tooltip"
                                                                title="Edit Task" class="btn btn-link btn-primary">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </form>

                                                        <form
                                                            action="{{ route('categories-services.destroy', $category->id) }}"
                                                            method="POST" id="delete-form-{{ $category->id }}"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" data-bs-toggle="tooltip"
                                                                title="Delete Task" class="btn btn-link btn-danger"
                                                                onclick="confirmDelete({{ $category->id }})">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
