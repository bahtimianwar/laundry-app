<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Wajib dipanggil untuk fitur login bawaan Laravel

class AuthController extends Controller
{
    // 1. Fungsi untuk MENAMPILKAN halaman (View) Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 2. Fungsi untuk MEMPROSES data saat tombol "Masuk" diklik
    public function login(Request $request)
    {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Kalau sukses, kirim ke dashboard
        return redirect()->intended('dashboard');
    }

    // Kalau gagal, balikkan ke login dengan error
    return back()->withErrors(['email' => 'Email atau password salah!']);
}

    // 3. Fungsi untuk LOGOUT (Keluar)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}