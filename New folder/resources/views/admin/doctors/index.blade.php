@extends('layouts.admin')
@section('title', 'Doctors')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Doctors List <a href="/admin/doctors/create" class="float-right btn btn-info"><i
                            class="fas fa-plus mr-2"></i> Add New Doctor</a></div>
                <div class="card-body">
                    <table class="table table-bordered" style="table-layout: fixed">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Specialism</th>
                                <th>Status</th>
                                <th>Picture</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <th>{{ $doctor->name }}</th>
                                    <td>{{ $doctor->specialism }}</td>
                                    <td>
                                        @if ($doctor->status == 1) <span
                                                class="badge bg-success d-block text-white">Active</span>
                                        @else <span class="badge bg-warning d-block text-white">Inactive</span>
                                        @endif
                                    </td>
                                    <td><img class="img-fluid" src="/upload_images{{ '/' . $doctor->picture }}"></img></td>
                                    <td>
                                        @if ($doctor->created_at)
                                            {{ $doctor->created_at->format("D, d M Y \n H:i:s") }}@endif
                                    </td>
                                    <td>
                                        @if ($doctor->updated_at)
                                            {{ $doctor->updated_at->format("D, d M Y \n H:i:s") }}@endif
                                    </td>
                                    <td>
                                        <a href="/admin/doctors/{{ $doctor->id }}"
                                            class="btn text-white btn-info btn-block">
                                            <i class="fas fa-pen mr-2"></i> Edit
                                        </a>
                                        <a href="/admin/doctors/delete/{{ $doctor->id }}"
                                            class="btn text-white btn-danger btn-block">
                                            <i class="fas fa-trash mr-2"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
