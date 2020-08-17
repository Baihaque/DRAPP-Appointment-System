<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./admin">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Laravel">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/flag.min.css') }}" rel="stylesheet"> <!-- icons -->
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

        @include('components.sidebar')

        @include('components.header')

        <div class="c-body">

            <main class="c-main">
                @if (session()->has('success'))
                    <div class="container-fluid">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check mr-2"></i> {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="container-fluid">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li><i class="fas fa-times mr-2"></i>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                @yield('content')

            </main>
            @include('components.footer')
        </div>
    </div>



    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('js/coreui-utils.js') }}"></script>
    @yield('javascript')




</body>

</html>
