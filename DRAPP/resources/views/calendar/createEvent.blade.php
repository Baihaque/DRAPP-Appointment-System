@extends('layouts.app')

@section('content')
    <form action="{{route('cal.store')}}" method="POST" role="form">
        {{csrf_field()}}
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title text-center">Set Google Calender Reminder</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <h4 for="title">Title</h4>
                  <input class="form-control" name="title" placeholder="Title" type="text">
                </div>
                <div class="form-group">
                    <h4 for="description">Description</h4>
                  <input class="form-control" name="description" placeholder="Description" type="text">
                </div>
                <div class="form-group">
                    <h4 for="start_date">Appointment Date & Time to Start The Reminder</h4>
                    <label>(Please insert date & time with this format 'YYYY-MM-DDTHH:MM:SS-07:00')</label>
                    <input class="form-control" name="start_date" placeholder="2020-01-30T09:00:00-07:00" type="text">
                </div>
                <div class="form-group">
                    <h4 for="end_date">Appointment Date & Time to End The Reminder</h4>
                    <label>(Please insert date & time with this format 'YYYY-MM-DDTHH:MM:SS-07:00')</label>
                    <input class="form-control" name="end_date" placeholder="2020-01-30T09:00:00-07:00" type="text">
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>   
              </div>
              <!-- /.card-body -->
            </div>
    </form>
@endsection