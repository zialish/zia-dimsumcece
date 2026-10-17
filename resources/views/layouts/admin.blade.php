<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dimsum Cece')</title>

    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        {{-- Navbar --}}
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ url('/admin') }}" class="nav-link">
                            Dimsum Cece
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- Sidebar --}}
        <aside class="app-sidebar bg-dark shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="{{ url('/admin') }}" class="brand-link text-decoration-none"
                    style="height: 70px; padding: 5px 12px; display: flex; align-items: center; justify-content: flex-start;">

                    <img src="{{ asset('images/logo.png') }}" alt="Logo Dimsum Cece"
                        style="width: 60px; height: 60px; object-fit: contain; margin: 0 -4px 0 0; padding: 0; flex-shrink: 0;">

                    <span
                        style="color: #c2c7d0; font-size: 20px; font-weight: 400; margin: 0; padding: 0; line-height: 1; white-space: nowrap;">
                        Dimsum Cece
                    </span>
                </a>
            </div>

            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" role="menu">
                        <li class="nav-item">
                            <a href="{{ url('/admin') }}" class="nav-link">
                                <i class="nav-icon bi bi-speedometer"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-box-seam"></i>
                                <p>Produk</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        {{-- Konten halaman --}}
        <main class="app-main">
            <div class="app-content p-4">
                @yield('content')
            </div>
        </main>

        {{-- Footer --}}
        <footer class="app-footer">
            <strong>Dimsum Cece</strong>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('adminlte/js/adminlte.js') }}"></script>
</body>

</html>
