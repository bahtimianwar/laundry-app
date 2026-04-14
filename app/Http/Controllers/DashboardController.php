<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\Layanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Kita ambil data simpel buat pajangan dashboard
        $total_pelanggan = Pelanggan::count();
        $total_transaksi = Transaksi::count();
        $total_pendapatan = Transaksi::sum('total_harga');
        
        return view('dashboard', compact('total_pelanggan', 'total_transaksi', 'total_pendapatan'));
    }
}
