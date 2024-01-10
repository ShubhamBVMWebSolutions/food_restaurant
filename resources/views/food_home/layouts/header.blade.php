
@php
$value = Session::get('username');
$email=Session::get('email');
@endphp
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="{{route('home')}}" class="logo d-flex align-items-center me-auto me-lg-0">
            <h1>Yummy<span>.</span></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{route('home')}}">Home</a></li>
                {{-- <li><a href="#about">About</a></li> --}}
                <li class="dropdown"><a href="#"><span>About Us</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="{{route('testimonials')}}">Testimonials</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">404 Page</a></li>
                        <li class="dropdown"><a href="#"><span>Gallery</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="#">Gallery 1 Columns</a></li>
                                <li><a href="#">Gallery 2 Columns</a></li>
                                <li><a href="#">Gallery 3 Columns</a></li>
                                <li><a href="#">Gallery 4 Columns</a></li>
                                <li><a href="#">Gallery 5 Columns</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="{{route('menu')}}">Menu</a></li>
                <li><a href="#events">Events</a></li>
                <li><a href="{{route('cheif')}}">Chief </a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav><!-- .navbar -->
        @if(isset($value))
        {{-- <a class="btn-book-a-table" id="logout" {{ Session::get('review_id') != null ? 'href='.route('logout') : 'data-toggle=modal data-target=#logoutModal href=#' }}>Hii {{$value}}</a> --}}
        <!-- Example split danger button -->
            <div class="btn-group">
                {{-- <button type="button" herf = "{{route('profile')}}" class="btn btn-danger">Hii {{$value}}</button> --}}
                <a class="btn btn-danger btn-book-a-table" href="{{route('profile')}}">Hii {{$value}}</a>
                <button type="button" class="btn btn-danger btn-book-a-table dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only"></span>
                </button>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"  id="logout" {{ Session::get('review_id') != null ? 'href='.route('logout') : 'data-toggle=modal data-target=#logoutModal href=#' }}>Logout</a>
                </div>
            </div>
        @else
        <a class="btn-book-a-table" href="{{route('login')}}">Login / Register</a>
        @endif
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header><!-- End Header -->
