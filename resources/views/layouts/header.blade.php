<nav class="navbar navbar-expand-md navbar-dark bg-success fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Movie App</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link @yield('navHome')" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('navMovie')" href="/movie">Movie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('navMosen')" href="/category">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('navProdi')" href="{{ route('movie.create') }}">Input Movie</a>
                    </li>
                @endauth
            </ul>

            <form class="d-flex me-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-light" type="submit">Search</button>
            </form>

            @auth
              
                <div class="dropdown">
                    <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownUser"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                        <li class="px-3 py-1 text-muted small">{{ Auth::user()->email }}</li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
            @endauth
        </div>
    </div>
</nav>
