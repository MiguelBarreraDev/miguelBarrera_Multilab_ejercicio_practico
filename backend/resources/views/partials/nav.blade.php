<!-- TODO: Extraer en un archivo css -->
<style>
    .button-logout {
        align-items: center;
        gap: .5em;
    }
</style>
<!-- -------------------------------- -->

<!-- TODO: Extraer en un archivo js -->
<script defer>
    document.addEventListener('DOMContentLoaded', function() {

        // Get all "navbar-burger" elements
        var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any nav burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach(function($el) {
                $el.addEventListener('click', function() {

                    // Get the target from the "data-target" attribute
                    var target = $el.dataset.target;
                    var $target = document.getElementById(target);

                    // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                    $el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });
</script>
<!-- ----------------------------------------- -->

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
