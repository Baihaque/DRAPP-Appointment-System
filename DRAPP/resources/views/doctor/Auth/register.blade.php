@extends('layouts.auth')
@section('title', 'Register Doctor')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register Doctor</div>
                    <div class="card-body">
                        <form action="{{ route('doctor.register') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Name</label>
                                <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail Address</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" name="c_password" id="c_password" class="form-control">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <button class="btn btn-info"><i class="fas fa-user-plus mr-2"></i>Sign Up</button>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a class="text-info" href="/doctor/login">Already have account?</a>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection