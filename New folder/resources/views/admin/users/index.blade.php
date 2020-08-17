@extends('layouts.admin')
@section('title', 'Users')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Patients List</div>
                <div class="card-body">
                    <table class="table table-bordered" style="table-layout: fixed">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th>{{$user->name}}</th>
                                <td>{{$user->email}}</td>
                                <td>@if ($user->status == 1) <span class="badge bg-success d-block text-white">Active</span> @else <span class="badge bg-warning d-block text-white">Inactive</span> @endif</td>
                                <td>@if ($user->created_at){{ $user->created_at->format("D, d M Y \n H:i:s") }}@endif</td>
                                <td>@if ($user->updated_at){{ $user->updated_at->format("D, d M Y \n H:i:s") }}@endif</td>
                                <td>
                                    <a href="/admin/users/{{$user->id}}" class="btn text-white btn-info btn-block">
                                        <i class="fas fa-pen mr-2"></i> Edit
                                    </a>
                                    <a href="/admin/users/delete/{{$user->id}}" class="btn text-white btn-danger btn-block">
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