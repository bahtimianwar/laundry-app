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
        // Validasi: Pastikan email dan password tidak kosong
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek kecocokan dengan database tabel 'users'
        if (Auth::attempt($credentials)) {
            // Kalau cocok: Buat sesi baru (biar aman) lalu pindah ke halaman utama
            $request->session()->regenerate();
            
            // Catatan: '/transaksi' bisa diganti sesuai URL halaman utama/dashboard kalian nanti
            return redirect()->intended('/transaksi'); 
        }

        // Kalau gagal: Tendang balik ke halaman login dan kirim pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email'); // Biar user nggak perlu ketik ulang emailnya
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