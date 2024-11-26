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
                                    onclick="window.location.href='{{ route('partner.create') }}'">
                                    <i class="fa fa-plus"></i> Add Partner
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>link</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Nama</th>
                                            <th>Link</th>
                                            <th>Aksi</th>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($partners as $partner)
                                            <tr>
                                                <td><img src="{{ asset($partner->path) }}"
                                                        alt="{{ $partner->title }}" style="width: 100px"></td>
                                                <td>{{ $partner->title }}</td>
                                                <td>
                                                    @if (!empty($partner->link))
                                                        <i class="fas fa-check text-success"></i> <!-- Ceklis jika link ada -->
                                                    @else
                                                        <i class="fas fa-times text-danger"></i> <!-- Silang jika link kosong -->
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <form action="{{ route('partner.edit', $partner->id) }}"
                                                            method="GET" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" data-bs-toggle="tooltip"
                                                                title="Edit Task" class="btn btn-link btn-primary">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('partner.destroy', $partner->id) }}"
                                                            method="POST" id="delete-form-{{ $partner->id }}"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" data-bs-toggle="tooltip"
                                                                title="Delete Task" class="btn btn-link btn-danger"
                                                                onclick="confirmDelete({{ $partner->id }})">
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
