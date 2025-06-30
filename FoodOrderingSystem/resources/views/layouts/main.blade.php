
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar-link.active {
            background-color: #0d6efd;
        }
    </style>
</head>
<body>
    @if(request()->is('admin*'))
        <div class="d-flex">
            @include('partials.sidebar')
            <div class="flex-grow-1">
                <main class="container-fluid py-4">
                    @yield('container')
                </main>
            </div>
        </div>
    @else

        @include('partials.navigasi')
        <main>
            @yield('container')
        </main>
        @include('partials.footer')
    @endif

    @stack('modals')
    @stack('script')

    <!-- jQuery (required for AJAX with $) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>