@extends('backend.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Our Team</h3>
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
                        <a href="#">Our Team</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Member</h4>
                                <button class="btn btn-primary btn-round ms-auto"
                                    onclick="window.location.href='{{ route('our-team.create') }}'">
                                    <i class="fa fa-plus"></i> Add Team Member
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Social Links</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Social Links</th>
                                            <th>Action</th>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($teams as $team)
                                            <tr>
                                                <td>{{ $team->name }}</td>
                                                <td>{{ $team->position }}</td>
                                                <td>
                                                    <img src="{{ asset($team->path) }}" alt="{{ $team->name }}" style="width: 100px;">
                                                </td>
                                                <td>{!! Str::limit($team->description, 50) !!}</td>
                                                <td>
                                                    <a href="{{ $team->facebook }}" target="_blank" class="btn btn-link btn-sm"><i class="fa fa-facebook"></i></a>
                                                    <a href="{{ $team->twitter }}" target="_blank" class="btn btn-link btn-sm"><i class="fa fa-twitter"></i></a>
                                                    <a href="{{ $team->dribbble }}" target="_blank" class="btn btn-link btn-sm"><i class="fa fa-dribbble"></i></a>
                                                    <a href="{{ $team->linkedin }}" target="_blank" class="btn btn-link btn-sm"><i class="fa fa-linkedin"></i></a>
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <form action="{{ route('our-team.edit', $team->id) }}"
                                                            method="GET" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" data-bs-toggle="tooltip"
                                                                title="Edit Member" class="btn btn-link btn-primary">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('our-team.destroy', $team->id) }}" method="POST" id="delete-form-{{ $team->id }}" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" data-bs-toggle="tooltip" title="Delete Member" class="btn btn-link btn-danger" onclick="confirmDelete({{ $team->id }})">
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
