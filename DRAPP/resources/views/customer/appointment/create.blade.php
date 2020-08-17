@extends('layouts.app')
@section('title', 'Login Admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register Admin</div>
                    <div class="card-body">
                        <form action="{{ route('admin.register') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">User name</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail Address</label>
                                <input type="email" name="email" id="email" class="form-control">
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
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection