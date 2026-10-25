{{-- Start sidebar --}}
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

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ url('/admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people"></i>
                        <p>User</p>
                    </a>
                </li>

                {{-- Produk --}}
                <li class="nav-item">
                    <a href="{{ route('products.index') }}"
                        class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-box-seam"></i>
                        <p>Produk</p>
                    </a>
                </li>

                {{-- Kategori --}}
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}"
                        class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-tags"></i>
                        <p>Kategori</p>
                    </a>
                </li>

                {{-- Pelanggan --}}
                <li class="nav-item">
                    <a href="{{ route('customers.index') }}"
                        class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Pelanggan</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
{{-- End sidebar --}}
