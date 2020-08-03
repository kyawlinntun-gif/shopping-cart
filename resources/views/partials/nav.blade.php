<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('APP_NAME', 'Shopping Cart') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('cart/show') }}"><i class="fas fa-shopping-cart"></i> Cart <span class="badge badge-pill badge-primary">{{ Session::has('cart') ? Session::get('cart')->totalQty : 0 }}</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> {{ Auth::user() ? Auth::user()->username : 'Username' }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @guest
                            <a class="dropdown-item" href="{{ route('register') }}">SignUp</a>
                            <a class="dropdown-item" href="{{ route('login') }}">SignIn</a>
                        @else
                            <a href="{{ url('profile') }}" class="dropdown-item">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
                            <form action="{{ route('logout') }}" method="post" id="logout">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>