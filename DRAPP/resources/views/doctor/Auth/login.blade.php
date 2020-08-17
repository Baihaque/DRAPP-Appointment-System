@extends('layouts.auth')
@section('title', 'Login Doctor')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login Doctor</div>
                    <div class="card-body">
                        <form action="{{ route('doctor.login') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="email">E-mail Address</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <button class="btn btn-info"><i class="fas fa-sign-in-alt mr-2"></i>Sign In</button>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a class="text-info" href="/doctor/register">Don't have account?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection