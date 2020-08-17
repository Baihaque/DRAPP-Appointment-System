@extends('layouts.admin')
@section('title', 'Appointment Detail')
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-header">Appointments {{$data->id}}</div>
            <div class="card-body">
                <form action="/admin/appointments/update" method="POST">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_id">Customer</label>
                                <input type="text" name="customer_id" id="customer_id" class="form-control" value="{{$data->user->name}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doctor_id">Doctor</label>
                                <input type="text" name="doctor_id" id="doctor_id" class="form-control" value="{{$data->doctor->name}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{$data->date}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="time" name="time" id="time" class="form-control" value="{{$data->time}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="stutus" class="form-control">
                                    <option value="0" @if ($data->status == 0) selected="selected" @endif >Inactive</option>
                                    <option value="1" @if ($data->status == 1) selected="selected" @endif >Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info"><span class="cil-save btn-icon mr-2"></span>Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection