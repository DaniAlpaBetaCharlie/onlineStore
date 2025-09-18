<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
        rel="stylesheet"
        crossorigin="anonymous"
    />

    <link href="{{ secure_asset('/css/admin.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>@yield('title', 'Admin - Online Store')</title>
</head>
<body class="d-flex flex-column min-vh-100">

    <div class="row g-0 flex-grow-1">
        <!-- Sidebar -->
        <aside class="col-md-3 col-lg-2 bg-dark text-white p-3">
            <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
                <span class="fs-4 fw-bold">⚙️ Admin Panel</span>
            </a>
            <hr />

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.home.index') }}" 
                       class="nav-link text-white {{ request()->routeIs('admin.home.index') ? 'active' : '' }}">
                        🏠 Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.product.index') }}" 
                        class="nav-link text-white {{ request()->routeIs('admin.product.*') ? 'active' : '' }}">
                        📦 Products
                    </a>

                </li>
            </ul>

            <div class="mt-4">
                <a href="{{ route('home.index') }}" class="btn btn-primary w-100">
                    ⬅️ Back to Store
                </a>
            </div>
        </aside>
        <!-- /Sidebar -->

        <!-- Content -->
        <main class="col-md-9 col-lg-10 bg-light">
            <!-- Navbar -->
            <nav class="p-3 shadow-sm d-flex justify-content-end align-items-center bg-white">
                <span class="me-2 text-muted">You logged in as <b>Admin</b></span>
                <img 
                    class="img-profile rounded-circle border" 
                    src="{{ asset('/img/undraw_profile.svg') }}" 
                    alt="Profile" 
                    width="40" 
                    height="40"
                >
            </nav>

            <div class="container-fluid p-4">
                @yield('content')
            </div>
        </main>
        <!-- /Content -->
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <small>
                Copyright © 
                <a 
                    class="text-reset fw-bold text-decoration-none" 
                    target="_blank"
                    href="https://twitter.com/danielgarax"
                >
                    Daniel Correa
                </a>
            </small>
        </div>
    </footer>
    <!-- /Footer -->

    <!-- Bootstrap JS -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
        crossorigin="anonymous">
    </script>
</body>
</html>
