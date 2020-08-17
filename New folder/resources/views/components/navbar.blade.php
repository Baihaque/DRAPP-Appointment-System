<nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
    <div class="container">
        <a class="navbar-brand" href="/"><i class="fas fa-stethoscope"></i> Appointment</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt mr-2"></i> Sign
                            In</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link disabled">|</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link active" href="/register"><i class="fas fa-user-plus mr-2"></i> Sign
                            Up</a>
                    </li>
                @endguest
                @auth
                    {{-- <li class="nav-item mx-1">
                        <a class="nav-link" href="/doctors"><i class="fas fa-book-medical mr-2"></i> Available Doctor</a>
                    </li> --}}
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="/doctors"><i class="fas fa-search mr-2"></i> Search for a Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link disabled">|</a>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"
                            role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pt-0">
                            <div class="dropdown-header bg-light py-2"><strong>Profile</strong></div>
                            <a href="/appointments" class="dropdown-item"><i
                                        class="cil-calendar-check c-icon mfe-2"></i> Your Appointments</a>
                            <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
                            <form id="form_logout" action="/logout" method="post">
                                @csrf
                                <button class="dropdown-item" onclick="document.getElementById('form_logout').submit()"><i
                                        class="cil-account-logout c-icon mfe-2"></i>
                                    Logout</button>
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
