@extends('layouts.app')
@section('title', 'Available Doctor')
@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title">Search for Doctor</h1>
                <div class="card-text">
                @csrf
                    <form action="" id="form-search">
                        <div class="input-group mb-3">
                            <select name="name" id="name" class="form-control">
                                <option value=""></option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <select name="specialism" id="specialism" class="form-control">
                                <option value=""></option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->specialism }}">{{ $doctor->specialism }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info"><i class="fas fa-search mr-2"></i>Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title">Available Doctor</h1>
                <div id="show-result" class="card-text">
                    <div class="d-flex flex-wrap">
                        @foreach ($doctors as $doctor)
                                <div class="col-md-6 mb-2">
                                    <div class="row">
                                        <img class="img-thumbnail" width="150"
                                            src="upload_images{{ '/' . $doctor->picture }}" style="height: 150px;" />
                                        <div class="d-flex flex-column justify-content-center ml-2">
                                            <h3 class="strong">Name: {{ $doctor->name }}</h3>
                                            <p>Speciality: {{ $doctor->specialism }}</p>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    <!-- @foreach ($doctors->split($doctors->count() / 2) as $row)
                        <div class="row mx-0">
                            @foreach ($row as $doctor)
                                <div class="col-md-6 mb-2">
                                    <div class="row">
                                        <img class="img-thumbnail" width="150"
                                            src="upload_images{{ '/' . $doctor->picture }}" style="height: 150px;" />
                                        <div class="d-flex flex-column justify-content-center ml-2">
                                            <h3 class="strong">Name: {{ $doctor->name }}</h3>
                                            <p>Speciality: {{ $doctor->specialism }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach -->
                </div>
            </div>
            @if (App\Doctor::count() > 10)
                <div class="card-footer">
                    {{ $doctors->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#name').select2({
                placeholder: "Search by Name",
            });
            $('#specialism').select2({
                placeholder: "Search by Speciality",
            });

            $('#form-search').submit(function(e) {
                e.preventDefault();


                function getData() {
                    return $.ajax({
                        url: '/doctors/search',
                        method: 'POST',
                        data: {
                            name: $('#name').val(),
                            specialism: $('#specialism').val()
                        },
                        success: function(res) {
                            console.log(res);
                        }
                    })
                }

                function showResult(res) {
                    console.log(res);
                    $('.card-footer').hide()
                    if (res.length > 0) {
                        $('#show-result').html('')
                        $.each(res, function(index, value) {
                            console.log(value);
                            $('#show-result').append(`
                                            <div class="row mx-0">
                                                <div class="col-md-6 mb-2">
                                                    <div class="row">
                                                        <img class="img-thumbnail" width="150"
                                                            src="upload_images/${value.picture}" style="height: 150px;" />
                                                        <div class="d-flex flex-column justify-content-center ml-2">
                                                            <h3 class="strong">Name: ${value.name}</h3>
                                                            <p>Speciality: ${value.specialism}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            `)
                        })
                    } else {
                        $('#show-result').html('No records found!')
                    }
                }

                getData().done(showResult)
            })
        })

    </script>
@endsection
