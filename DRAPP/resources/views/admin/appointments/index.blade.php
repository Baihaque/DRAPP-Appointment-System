@extends('layouts.admin')
@section('title', 'Appointments')
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-header">Appointments List</div>
            <div class="card-body">
                <table class="table table-bordered" style="table-layout: fixed">
                    <thead>
                        <tr>
                            <th>Customers Name</th>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $list)
                        <tr>
                            <td>{{$list->user->name}}</td>
                            <td>{{$list->doctor->name}}</td>
                            <td>{{ date('D, d M Y', strtotime($list->date)) }}</td>
                            <td>{{ date('H:i:s', strtotime($list->time)) }}</td>
                            <td>@if ($list->created_at){{ $list->created_at->format("D, d M Y \n H:i:s") }}@endif</td>
                            <td>@if ($list->updated_at){{ $list->updated_at->format("D, d M Y \n H:i:s") }}@endif</td>
                            <td>@if ($list->status == 1) <span class="badge bg-success d-block text-white">Active</span> @else <span class="badge bg-warning d-block text-white">Inactive</span> @endif</td>
                            <td>
                                <a href="/admin/appointments/{{$list->id}}" class="btn text-white btn-info btn-block">
                                    <i class="fas fa-pen mr-2"></i> Edit
                                </a>
                                <a href="/admin/appointments/delete/{{$list->id}}" class="btn text-white btn-danger btn-block">
                                    <i class="fas fa-trash"></i> Delete
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