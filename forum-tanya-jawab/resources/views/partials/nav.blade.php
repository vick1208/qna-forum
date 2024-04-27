<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fffafa;">
    <a class="navbar-brand" href="/">Forum Kita</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ ($title === " Home") ? 'active' : '' }}">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item {{ ($title === " About") ? 'active' : '' }}">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item {{ ($title === " Post") ? 'active' : '' }}">
                <a class="nav-link" href="/post">Posts</a>
            </li>
            @auth
            <li class="nav-item {{ ($title === " Category") ? 'active' : '' }}">
                <a class="nav-link" href="/category">Categories</a>
            </li>
            @endauth
        </ul>

        <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item">
                <a class="btn btn-primary" href="/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Sign Up</a>
            </li>
            @endguest
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right">
                    <a class="dropdown-item" href="/profile">Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="nav-link btn btn-warning" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>


            @endauth
        </ul>
    </div>
    </div>
</nav>
