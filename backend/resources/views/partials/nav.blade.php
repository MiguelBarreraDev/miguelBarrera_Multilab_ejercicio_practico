<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        @auth
        <a class="navbar-brand" href="{{ url('/home') }}">
            <img src="https://www.multilab.com.pe/img/logo-default.webp" width="112" height="28">
        </a>
        @else
        <a class="navbar-brand">
            <img src="https://www.multilab.com.pe/img/logo-default.webp" width="112" height="28">
        </a>
        @endauth
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('/home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/pacientes')}}" target="_blank">Pacientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/centrosmedicos')}}" target="_blank">Centros médicos</a>
                </li>
            </ul>
            @auth
            <a href="/logout" class="btn btn-outline-teal">
                <i class=" fa-solid fa-right-from-bracket"></i>
                <strong>Log out</strong>
            </a>
            @endauth
        </div>
    </div>
</nav>