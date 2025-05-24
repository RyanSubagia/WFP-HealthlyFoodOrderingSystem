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
                    <a href="{{ route('menu.index')}}" class="nav-link {{ request()->routeIs('menu.index') ? 'active' : '' }} @yield('makanan')">Menu</a>
                </li>
                {{-- <li class="nav-item mx-3">
                    <a href="{{ route('listcustomer.index')}}" class="nav-link @yield('customer')">Customer</a>
                </li> --}}
                {{-- <li class="nav-item mx-3">
                    <a href="{{ route('listkategori.index')}}" class="nav-link @yield('customer')">Kategori</a>
                </li> --}}
                <li class="nav-item mx-3">
                    <a href="{{ route('about')}}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About Us</a>
                </li>
            </ul>

            <!-- Login button or user greeting -->
            @if (auth()->check())
                <div class="ms-4 user-greeting">
                    Hello, {{ auth()->user()->name }}
                </div>
            @else
                <a href="/login" class="btn login-btn ms-4 rounded-pill px-4 py-2" style="background-color: #F58232; color: white;">Login</a>
            @endif
        </div>
    </div>
</nav>