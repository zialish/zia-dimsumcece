@extends('layouts.guest.app')

@section('title', 'Selamat Datang - Dimsum Cece')

@section('content')
<style>
    .welcome-section {
        min-height: 75vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px 20px;
        background: linear-gradient(180deg, #fff7eb 0%, #ffffff 100%);
        text-align: center;
    }

    .welcome-content {
        max-width: 650px;
        width: 100%;
    }

    .welcome-content h1 {
        color: #8b451f;
        font-size: clamp(30px, 4vw, 46px);
        font-weight: 700;
        line-height: 1.25;
        margin-bottom: 20px;
    }

    .welcome-content p {
        color: #6b625d;
        font-size: 18px;
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .welcome-buttons {
        display: flex;
        justify-content: center;
        gap: 14px;
        flex-wrap: wrap;
    }

    .welcome-buttons a {
        min-width: 140px;
        padding: 12px 24px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-welcome-login {
        background: #ffb000;
        color: #fff;
        border: 1px solid #ffb000;
    }

    .btn-welcome-register {
        background: #fff;
        color: #8b451f;
        border: 1px solid #8b451f;
    }

    .btn-welcome-login:hover {
        background: #e99d00;
        color: #fff;
    }

    .btn-welcome-register:hover {
        background: #8b451f;
        color: #fff;
    }

    .welcome-home {
        display: inline-block;
        margin-top: 24px;
        color: #8b451f;
        text-decoration: none;
    }
</style>

<section class="welcome-section">
    <div class="welcome-content">
        <h1>Selamat Datang di Dimsum Cece!</h1>

        <p>
            Nikmati aneka dimsum lezat dengan cita rasa istimewa.
            Masuk atau buat akun untuk mulai menjelajahi menu kami.
        </p>

        <div class="welcome-buttons">
            <a href="{{ route('login') }}" class="btn-welcome-login">
                Login
            </a>

            <a href="{{ route('register') }}" class="btn-welcome-register">
                Register
            </a>
        </div>

        <a href="{{ url('/') }}" class="welcome-home">
            Lihat Beranda
        </a>
    </div>
</section>
@endsection
