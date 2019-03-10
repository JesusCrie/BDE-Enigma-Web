<div class="container-links">
    <a href="{{ route('home') }}" class="container-center-hv btn blue mr-1">
        <i class="material-icons lg:mr-1">home</i>
        <span class="hidden lg:block">Acceuil</span>
    </a>

    @guest
        <a href="{{ route('login') }}" class="container-center-hv btn blue mr-1">
            <i class="material-icons lg:mr-1">exit_to_app</i>
            <span class="hidden lg:block">Connexion</span>
        </a>
        <a href="{{ route('register') }}" class="container-center-hv btn blue ml-1">
            <i class="material-icons lg:mr-1">person_add</i>
            <span class="hidden lg:block">Inscription</span>
        </a>
    @else
        <a href="{{ route('logout') }}" class="container-center-hv btn red"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="material-icons lg:mr-1">power_settings_new</i>
            <span class="hidden lg:block">Logout</span>
        </a>

        <form action="{{ route('logout') }}" id="logout-form" method="post" class="hidden">
            @csrf
        </form>
    @endguest
</div>
