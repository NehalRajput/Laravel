<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand site-name" href="{{url('/')}}">
                <span class="logo-text">Unique<span class="highlight">Fashion</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/contact')}}">Contact</a>
                    </li>
                    
                    @auth
                        @if(Auth::user()->usertype == '1')
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/admin/redirect')}}">
                                    <i class="fa fa-cog"></i> Backend
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ url('show-cart') }}" class="nav-link cart-link">
                                <i class="fa fa-shopping-cart"></i> Cart
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">
                                    <i class="fa fa-sign-out"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-login" href="{{ route('login') }}">
                                <i class="fa fa-sign-in"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-register" href="{{ route('register') }}">
                                <i class="fa fa-user-plus"></i> Register
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
