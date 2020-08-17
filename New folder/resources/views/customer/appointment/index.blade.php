@extends('layouts.admin')
@section('title', 'Appointments')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">Appointment List</div>
                <div class="card-body">
                    <table class="table table-bordered" style="table-layout: fixed">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Doctor Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Created</th>
                                <th>Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $lists)
                            <tr>
                                <th>{{$user->name}}</th>
                                <th>{{$user->email}}</th>
                                <th>{{$user->status}}</th>
                                <td>
                                    <a href="/admin/users/{{$user->id}}" class="btn text-white btn-info">
                                        <i class="fas fa-pen mr-2"></i> Edit
                                    </a>
                                    <a href="/admin/users/{{$user->id}}" class="btn text-white btn-danger">
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