{{-- posisi tetap diatas --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">

        {{-- tempat logo di kiri atas --}}
        <a class="navbar-brand">
            <img src="img/logo.png" alt="Logo" style="height: 70px;">
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mx-3">
                    <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ $title === 'Menu' ? 'active' : '' }}" href="/menu">Menu</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{ $title === 'About' ? 'active' : '' }}" href="/about">About Us</a>
                </li>
            </ul>

            @if (auth()->check())
                <div class="ms-4 user-greeting">
                    Hello, {{ auth()->user()->name }}
                </div>
            @else
                <a href="/login" class="btn login-btn ms-4">Login</a>
            @endif
        </div>
    </div>
</nav>

