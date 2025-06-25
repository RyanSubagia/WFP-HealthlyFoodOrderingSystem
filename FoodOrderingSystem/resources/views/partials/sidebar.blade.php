<!-- Sidebar -->
<div class="bg-dark text-white vh-100 d-flex flex-column p-3" style="width: 250px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Sùshě</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('admin') }}" class="nav-link text-white sidebar-link {{ request()->routeIs('admin') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('order_admin') }}" class="nav-link text-white sidebar-link {{ request()->routeIs('order_admin') ? 'active' : '' }}">
                <i class="bi bi-cart-check me-2"></i> Orders
            </a>
        </li>
        <li>
            <a href="{{ route('product_admin') }}" class="nav-link text-white sidebar-link {{ request()->routeIs('product_admin') ? 'active' : '' }}">
                <i class="bi bi-box-seam me-2"></i> Products
            </a>
        </li>
        <li>
            <a href="{{ route('category_admin') }}" class="nav-link text-white sidebar-link {{ request()->routeIs('category_admin') ? 'active' : '' }}">
                <i class="bi bi-tags me-2"></i> Categories
            </a>
        </li>
        <li>
            <a href="{{ route('employee_admin') }}" class="nav-link text-white sidebar-link {{ request()->routeIs('employee_admin') ? 'active' : '' }}">
                <i class="bi bi-people me-2"></i> Employee
            </a>
        </li> 
        <li>
            <a href="{{ route('customer_admin') }}" class="nav-link text-white sidebar-link {{ request()->routeIs('customer_admin') ? 'active' : '' }}">
                <i class="bi bi-people me-2"></i> Customer
            </a>
<<<<<<< Updated upstream
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="nav-link text-white sidebar-link btn btn-link text-start w-100 p-0" style="border: none; background: none; text-decoration: none;">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
=======
        </li> 
        <li>
            <a href="{{ route('logout') }}" method="post" class="nav-link text-white sidebar-link {{ request()->routeIs('customer_admin') ? 'active' : '' }}">
                <i class="bi bi-people me-2"></i> Logout
            </a>
>>>>>>> Stashed changes
        </li>
    </ul>
    <hr>
</div>
<!-- End Sidebar -->