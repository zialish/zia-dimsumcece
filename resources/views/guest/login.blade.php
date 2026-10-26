@extends('layouts.guest.app')

@section('title', 'Login - Dimsum Cece')

@section('content')
    <div class="container py-5" style="max-width: 500px;">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                <h2 class="text-center fw-bold mb-2">Login</h2>
                <p class="text-center text-secondary mb-4">
                    Masuk ke akun Dimsum Cece
                </p>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('login.process') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Masukkan email" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-warning w-100">
                        Login
                    </button>
                </form>

                <p class="text-center mt-4 mb-0">
                    Belum punya akun?
                    <a href="{{ route('register') }}">Daftar di sini</a>
                </p>

                <div class="text-center mt-3">
                    <a href="{{ url('/') }}" class="text-secondary">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
