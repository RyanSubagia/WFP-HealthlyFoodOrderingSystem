<!-- Navigation Bar with Shadow -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
    <div class="container">
        <!-- Logo on left -->
        <a class="navbar-brand" href="/">
            <img src="img/logo.png" alt="Logo" style="height: 50px;">
        </a>

        <!-- Hamburger menu for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navigation items -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
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