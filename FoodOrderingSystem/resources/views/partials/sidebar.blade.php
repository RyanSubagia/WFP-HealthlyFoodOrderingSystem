@php
    $role = auth()->user()->role;
@endphp
<!-- Sidebar -->
<div class="sidebar-container">
    <a href="/" class="sidebar-brand">
        <span class="brand-text">Sùshě</span>
    </a>
    <hr class="sidebar-divider">
    <ul class="sidebar-nav">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.order_admin') }}" class="nav-link {{ request()->routeIs('admin.order_admin') ? 'active' : '' }}">
                <i class="bi bi-cart-check"></i>
                <span>Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.product_admin') }}" class="nav-link {{ request()->routeIs('admin.product_admin') ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i>
                <span>Products</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.category_admin') }}" class="nav-link {{ request()->routeIs('admin.category_admin') ? 'active' : '' }}">
                <i class="bi bi-tags"></i>
                <span>Categories</span>
            </a>
        </li>
        @if ($role === 'admin')
        <li class="nav-item">
            <a href="{{ route('admin.employee_admin') }}" class="nav-link {{ request()->routeIs('admin.employee_admin') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                <span>Employee</span>
            </a>
        </li> 
        <li class="nav-item">
            <a href="{{ route('admin.customer_admin') }}" class="nav-link {{ request()->routeIs('admin.customer_admin') ? 'active' : '' }}">
                <i class="bi bi-person-lines-fill"></i>
                <span>Customer</span>
            </a>
        </li>
        @endif
        
        <li class="nav-item logout-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link logout-btn">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>
        </li>
    </ul>
    
    <div class="sidebar-footer">
        <button class="theme-toggle" onclick="toggleTheme()">
            <i class="bi bi-palette"></i>
        </button>
    </div>
</div>

<script>
let currentTheme = 0;
const themes = ['', 'theme-blue', 'theme-red'];
const themeNames = ['Krem', 'Biru', 'Merah'];

function toggleTheme() {
    // Remove current theme
    document.documentElement.classList.remove(...themes.filter(t => t));
    
    // Move to next theme
    currentTheme = (currentTheme + 1) % themes.length;
    
    // Apply new theme
    if (themes[currentTheme]) {
        document.documentElement.classList.add(themes[currentTheme]);
    }
    
    // Update button icon based on theme
    const button = document.querySelector('.theme-toggle i');
    if (currentTheme === 0) button.className = 'bi bi-palette';
    else if (currentTheme === 1) button.className = 'bi bi-moon';
    else button.className = 'bi bi-sun';
    
    console.log('Theme changed to:', themeNames[currentTheme]);
}
</script>
<!-- End Sidebar -->