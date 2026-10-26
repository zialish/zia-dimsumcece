    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-inline-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Dimsum Cece" style="height: 60px; width: auto;">
                <span class="fs-3 fw-bold ms-2" style="color: #8B3E24;">
                    Dimsum Cece
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDimsum"
                aria-controls="navbarDimsum" aria-expanded="false" aria-label="Buka navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarDimsum">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menu Dimsum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#keranjang">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning px-4" href="{{ url('/auth') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

