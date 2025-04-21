<!-- Sidebar -->
<div class="bg-dark text-white vh-100 d-flex flex-column p-3" style="width: 250px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Sushe</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('admin') }}" class="nav-link text-white sidebar-link {{ request()->routeIs('admin') ? 'active' : '' }}">
                <i class="bi bi-house-door me-2"></i> Home
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard_admin') }}" class="nav-link text-white sidebar-link {{ request()->routeIs('dashboard_admin') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('order_admin') }}" class="nav-link text-white sidebar-link {{ request()->routeIs('order_admin') ? 'active' : '' }}">
                <i class="bi bi-table me-2"></i> Orders
            </a>
        </li>
        <li>
            <a href="{{ route('product_admin') }}" class="nav-link text-white sidebar-link {{ request()->routeIs('products_admin') ? 'active' : '' }}">
                <i class="bi bi-box-seam me-2"></i> Products
            </a>
        </li>
        <li>
            <a href="{{ route('customer_admin') }}" class="nav-link text-white sidebar-link {{ request()->routeIs('customer_admin') ? 'active' : '' }}">
                <i class="bi bi-people me-2"></i> Customer
            </a>
        </li>
    </ul>
    <hr>
</div>
<!-- End Sidebar -->
