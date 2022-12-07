<!-- TODO: Extraer en un archivo css -->
<style>
    .button-logout {
        align-items: center;
        gap: .5em;
    }
</style>
<!-- -------------------------------- -->

<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        @auth
        <a class="navbar-item" href="{{ url('/home') }}">
            <img src="https://www.multilab.com.pe/img/logo-default.webp" width="112" height="28">
        </a>
        @else
        <a class="navbar-item">
            <img src="https://www.multilab.com.pe/img/logo-default.webp" width="112" height="28">
        </a>
        @endauth

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>


    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            @auth
            <a class="navbar-item" href="{{ url('/home') }}">
                Home
            </a>
            @endauth
            <a class="navbar-item" href="{{ url('/centrosmedicos') }}" target="_blank">
                Centros médicos
            </a>
            <a class="navbar-item" href="{{ url('/pacientes') }}" target="_blank">
                Pacientes
            </a>
        </div>
        @auth
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="/logout" class="button is-primary is-outlined button-logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <strong>Log out</strong>
                    </a>
                </div>
            </div>
        </div>
        @endauth
    </div>
</nav>