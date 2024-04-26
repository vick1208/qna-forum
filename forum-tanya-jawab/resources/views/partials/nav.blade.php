<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ddd3d3;">
    <a class="navbar-brand" href="/">Forum Kita</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ ($title === "Home") ? 'active' : '' }}">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item {{ ($title === "About") ? 'active' : '' }}">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item {{ ($title === "Post") ? 'active' : '' }}">
                <a class="nav-link" href="/post">Posts</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="btn btn-primary" href="/login">Login</a>
            </li>
        </ul>
    </div>
    </div>
</nav>
