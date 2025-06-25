<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="img/logo/logo_Navigasi.png" alt="Logo" style="height: 35px;">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item mx-3" >
                    <a href="{{ route('home')}}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="{{ route('menu.index')}}" class="nav-link {{ request()->routeIs('menu') ? 'active' : '' }} @yield('menu')">Menu</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="{{ route('customer.about')}}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About Us</a>
                </li>
            </ul>

            <!-- Login button or user dropdown -->
            @if (auth()->check())
                <div class="dropdown ms-4">
                    <button class="btn dropdown-toggle user-greeting" type="button" id="userDropdown" 
                            data-bs-toggle="dropdown" aria-expanded="false"
                            style="background: none; border: none; color: #333; font-weight: 500;">
                        Hello, {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                                @csrf
                                <button type="submit" class="dropdown-item" 
                                        style="color: #dc3545; border: none; background: none; width: 100%; text-align: left;">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/login" class="btn login-btn ms-4 rounded-pill px-4 py-2" style="background-color: #F58232; color: white;">Login</a>
            @endif
        </div>
    </div>
</nav>