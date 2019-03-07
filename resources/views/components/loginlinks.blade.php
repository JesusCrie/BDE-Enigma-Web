<div class="container-links">
    @guest
        <a href="{{ route('login') }}" class="container-flex-center btn blue mr-1">
            <i class="material-icons lg:mr-1">exit_to_app</i>
            <span class="hidden lg:block">Login</span>
        </a>
        <a href="{{ route('register') }}" class="container-flex-center btn blue ml-1">
            <i class="material-icons lg:mr-1">person_add</i>
            <span class="hidden lg:block">Register</span>
        </a>
    @else
        <a href="{{ route('logout') }}" class="container-flex-center btn red"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="material-icons lg:mr-1">power_settings_new</i>
            <span class="hidden lg:block">Logout</span>
        </a>

        <form action="{{ route('logout') }}" id="logout-form" method="post" class="hidden">
            @csrf
        </form>
    @endguest
</div>
