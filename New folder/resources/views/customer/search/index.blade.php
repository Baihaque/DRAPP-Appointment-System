@extends('layouts.app')
@section('title', 'Search Doctor')
@section('content')
    <div class="container">
        <div class="card-group mt-5 mb-5">
            <div class="card">
                <div class="card-body">
                    <h1>Search Doctor</h1>
                    <form id="form_search" action="/doctors/search" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="specialism">Speciality</label>
                                <input type="text" name="specialism" id="specialism" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info"><i class="fas fa-search mr-2"></i>Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>Search Result</h1>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="https://placehold.it/150x200" id="preview" class="img-thumbnail">
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="result_name">Name</label>
                                    <input type="text" name="result_name" id="result_name" class="form-control-plaintext">
                                </div>
                                <div class="form-group">
                                    <label for="result_speciality">Speciality</label>
                                    <input type="text" name="result_speciality" id="result_speciality"
                                        class="form-control-plaintext">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#form_search').submit(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/doctors/search',
                    method: 'POST',
                    data: {
                        name: $('#name').val(),
                        specialism: $('#specialism').val()
                    },
                    success: function(res) {
                        console.log(res);
                        $('#preview').attr('src', `/upload_images/${res[0].picture}`);
                    }
                })
            })
        })

    </script>
@endsection
