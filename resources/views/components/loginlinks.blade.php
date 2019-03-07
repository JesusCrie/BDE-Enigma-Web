
<div class="container-links">
    @guest
        <a href="{{ route('login') }}" class="btn blue mr-1">Login</a>
        <a href="{{ route('register') }}" class="btn blue ml-1">Register</a>
    @else
        <a href="{{ route('logout') }}" class="btn red"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form action="{{ route('logout') }}" id="logout-form" method="post" class="hidden">
            @csrf
        </form>
    @endguest
</div>
