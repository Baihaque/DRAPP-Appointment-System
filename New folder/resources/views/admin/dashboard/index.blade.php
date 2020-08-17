@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-gradient-info">
                    <div class="card-body">
                        <div class="text-muted text-right mb-4">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <div class="text-value-lg">{{ $users }}</div>
                        <small class="text-muted text-uppercase font-weight-bold">Active Users</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-gradient-success">
                    <div class="card-body">
                        <div class="text-muted text-right mb-4">
                            <i class="fas fa-stethoscope fa-2x"></i>
                        </div>
                        <div class="text-value-lg">{{ $doctors }}</div>
                        <small class="text-muted text-uppercase font-weight-bold">Active Doctors</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-gradient-warning">
                    <div class="card-body">
                        <div class="text-muted text-right mb-4">
                            <i class="fas fa-file-medical-alt fa-2x"></i>
                        </div>
                        <div class="text-value-lg">{{ $appointments }}</div>
                        <small class="text-muted text-uppercase font-weight-bold">Active Appointments</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-gradient-dark">
                    <div class="card-body">
                        <div class="text-muted text-right mb-4">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <div class="text-value-lg">{{ $users_inactive }}</div>
                        <small class="text-muted text-uppercase font-weight-bold">Inactive Users</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-gradient-dark">
                    <div class="card-body">
                        <div class="text-muted text-right mb-4">
                            <i class="fas fa-stethoscope fa-2x"></i>
                        </div>
                        <div class="text-value-lg">{{ $doctors_inactive }}</div>
                        <small class="text-muted text-uppercase font-weight-bold">Inactive Doctors</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-gradient-dark">
                    <div class="card-body">
                        <div class="text-muted text-right mb-4">
                            <i class="fas fa-file-medical-alt fa-2x"></i>
                        </div>
                        <div class="text-value-lg">{{ $appointments_inactive }}</div>
                        <small class="text-muted text-uppercase font-weight-bold">Inactive Appointments</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection