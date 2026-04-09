<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Penting untuk ditambahkan

class AuthController extends Controller
{
    /**
     * Menangani percobaan autentikasi (Login).
     */
    public function login(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Coba login dengan kredensial tersebut
        // Parameter kedua 'true' mengaktifkan fitur 'remember me' (opsional)
        if (Auth::attempt($credentials, $request->remember)) {
            
            // 3. Regenerasi session untuk mencegah serangan session fixation
            $request->session()->regenerate();

            // Redirect ke halaman yang dituju atau dashboard
            return redirect()->intended('dashboard')
                             ->with('success', 'Selamat datang kembali!');
        }

        // 4. Jika gagal, kembalikan ke form login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email'); // Tetap menampilkan email di input agar user tidak ngetik ulang
    }

    /**
     * Menangani proses logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}