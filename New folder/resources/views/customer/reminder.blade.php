@extends('layouts.app')

@section('content')
<div>
<button type="button" href="/cal" class="btn btn-primary btn-lg pull-left">Set Reminder with Google Calendar</button>
</div>
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title">Your Appointments</h1>
            <div class="card-text">
                <div class="d-flex flex-wrap">
                    @if(isset($data)&&($data->count() != 0))
                        @foreach($data as $d)
                        <div class="col-md-6">
                            <div class="row">
                                <img class="img-thumbnail" width="150"
                                    src="upload_images{{ '/' . $d->doctor->picture }}" style="height: 150px;" />
                                <div class="d-flex flex-column justify-content-center ml-2 text-justify">
                                    <h3 class="strong">Name: {{ $d->doctor->name }}</h3>
                                    <h5>Speciality: {{ $d->doctor->specialism }}</h5>
                                    <p class="mb-0">Date: {{ date('D, d M Y', strtotime($d->date)) }}</p>
                                    <p class="mb-2">Time: {{ date('H:i:s', strtotime($d->time)) }}</p>
                                    <div class="row no-gutters">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p class="card-subtitle">There are no current appointments.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection