<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = \App\Models\User::where('email', $request->email)->first();

    if ($user && \Illuminate\Support\Facades\Hash::check(
        $request->password,
        $user->password
    )) {
        return redirect('/admin')
            ->with('success', 'Login berhasil!');
    }

    return back()
        ->with('error', 'Email atau password salah.')
        ->withInput($request->only('email'));
}
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        return back()->with(
            'success',
            'Validasi registrasi berhasil. Data belum disimpan.'
        );
    }
}
