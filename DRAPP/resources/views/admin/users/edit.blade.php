@extends('layouts.admin')
@section('title', 'User Detail')
@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">User {{ $user->id }}</div>
                <div class="card-body">
                    <form action="/admin/users/update" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="0" @if ($user->status == 0) selected="selected" @endif >Inactive</option>
                                        <option value="1" @if ($user->status == 1) selected="selected" @endif >Active</option>
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