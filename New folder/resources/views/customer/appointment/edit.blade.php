@extends('layouts.app')
@section('title', 'Book Appointment')
@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1>Appointment Summary</h1>
                <p>Summary of your appointment.</p>
                <form action="/appointments/update" method="post">
                @csrf
                <input type="hidden" name="doctor_id" value="{{$data['doctor']->id}}">
                <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="card-text">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{$data['user']->name}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{$data['user']->email}}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <img src="{{ url('/upload_images') }}/{{$data['doctor']->picture}}" id="preview" class="img-thumbnail">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="doctor_name">Doctor's Name</label>
                                            <input type="text" name="doctor_name" id="doctor_name" class="form-control"
                                                value="{{$data['doctor']->name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="specialism">Speciality</label>
                                            <input type="text" name="specialism" id="specialism" class="form-control"
                                                value="{{$data['doctor']->specialism}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" name="date" id="date" class="form-control" value="{{$data->date}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="time">Time</label>
                                            <input type="time" name="time" id="time" class="form-control" value="{{$data->time}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-info btn-block">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
