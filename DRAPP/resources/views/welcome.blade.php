@extends('layouts.app')
@section('title', 'Appointment')
@section('content')
    <div class="container mt-3 mb-3">
        <div id="carouselExampleIndicators" class="carousel slide shadow" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" style="height: 400px; object-fit: cover;"
                        src="{{ asset('assets/img/banner-1.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" style="height: 400px; object-fit: cover;"
                        src="{{ asset('assets/img/banner-2.jpg') }}" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <form action="{{ route('customer.appointment.apply') }} " method="get">
                    @csrf
                    <div class="card-body">
                        <p class="text-muted">Apply for an appointment.</p>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="doctor">Choose Doctor</label>
                                        <select name="doctor" id="doctor" class="form-control select2-single" style="width: 100%;">
                                            <option value="" selected disabled>Choose One</option>
                                            @foreach ($data as $d)
                                                <option value="{{ $d->id }}" data-image="/upload_images/{{ $d->picture }}"
                                                    data-specialism="{{ $d->specialism }}">{{ $d->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date">Choose Date</label>
                                        <input type="date" name="date" id="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="doctor">Choose Time</label>
                                        <input type="time" name="time" id="time" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-block btn-info" {{ !Auth::check() ? 'disabled' : '' }}>{{ !Auth::check() ? 'You need to login first' : 'Apply Now!' }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $("#doctor").select2({
                templateResult: formatState,
                // minimumResultsForSearch: Infinity
            });

            function formatState(opt) {
                if (!opt.id) {
                    return opt.text
                }

                var optimage = $(opt.element).attr('data-image');
                var optspecialsm = $(opt.element).attr('data-specialism');
                console.log(optimage)
                if (!optimage) {
                    return opt.text;
                } else {
                    var $opt = $(
                        `<div class="row px-3 w-75">
                                            <div><img src="${optimage}" width="100px"/></div>
                                            <div class="align-self-center ml-2"><strong>${opt.text}</strong><br><p>${optspecialsm}</p></div>
                                        </div>`
                    );
                    return $opt;
                }
            };
        })

    </script>
@endsection
