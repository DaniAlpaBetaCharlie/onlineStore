<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- ✅ Bootstrap CSS -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        crossorigin="anonymous"
    >

    <title>@yield('title', 'Online Store')</title>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">Online Store</a>
            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" 
                aria-expanded="false" 
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="{{ route('home.index') }}">Home</a>
                    <a class="nav-link" href="{{ route('product.index') }}">Products</a>
                    <a class="nav-link" href="{{ route('home.about') }}">About</a>
                    <!--<a class="nav-link" href="#">Products</a>
                    <a class="nav-link" href="#">Contact</a>-->
                </div>
            </div>
        </div>
    </nav>
    <!-- /Navbar -->

    <!-- Header -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="fw-bold">Online Store</h1>
            <p class="lead">@yield('subtitle', 'A Laravel Online Store')</p>
        </div>
    </header>
    <!-- /Header -->

    <!-- Main Content -->
    <main class="flex-grow-1">
        <div class="container my-5">
            @yield('content')
        </div>
    </main>
    <!-- /Main Content -->

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <small>
                Copyright © 
                <a 
                    href="https://twitter.com/danielgarax" 
                    target="_blank" 
                    class="text-reset fw-bold text-decoration-none"
                >
                    Daniel Correa
                </a>
                - <b>Paola Vallejo</b>
            </small>
        </div>
    </footer>
    <!-- /Footer -->

    <!-- ✅ Bootstrap Bundle JS -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        crossorigin="anonymous"
    ></script>
</body>
</html>
