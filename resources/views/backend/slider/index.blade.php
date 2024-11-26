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
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <button class="btn btn-primary btn-round ms-auto"
                                    onclick="window.location.href='{{ route('slider.create') }}'">
                                    <i class="fa fa-plus"></i> Add Slider
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Overview</th>
                                            <th>Description</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Judul</th>
                                            <th>Ringkasan</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($sliders as $slider)
                                            <tr>
                                                <td><img src="{{ asset('/uploads/sliders/' . $slider->path) }}"
                                                        alt="{{ $slider->title }}" style="width: 100px"></td>
                                                <td>{{ $slider->title }}</td>
                                                <td>{{ Str::limit($slider->overview, 50) }}</td>
                                                <td>{!! Str::limit($slider->description, 100) !!}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <form action="{{ route('slider.edit', $slider->id) }}"
                                                            method="GET" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" data-bs-toggle="tooltip"
                                                                title="Edit Task" class="btn btn-link btn-primary">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('slider.destroy', $slider->id) }}" method="POST" id="delete-form-{{ $slider->id }}" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" data-bs-toggle="tooltip" title="Delete Task" class="btn btn-link btn-danger" onclick="confirmDelete({{ $slider->id }})">
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
