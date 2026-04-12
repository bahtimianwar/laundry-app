<?php
namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Layanan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index() {
        // Ambil transaksi beserta data pelanggannya (Relasi)
        $transaksis = Transaksi::with('pelanggan')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
{
    $pelanggans = \App\Models\Pelanggan::all();
    $layanans = \App\Models\Layanan::all();
    return view('transaksi.create', compact('pelanggans', 'layanans'));
}

public function store(Request $request)
{
    $layanan = \App\Models\Layanan::findOrFail($request->layanan_id);
    
    // Rumus: Berat x Harga per Kg
    $total_harga = $request->berat * $layanan->harga_perkg; 

    \App\Models\Transaksi::create([
        'pelanggan_id' => $request->pelanggan_id,
        'layanan_id' => $request->layanan_id,
        'berat' => $request->berat,
        'total_harga' => $total_harga,
        'status' => 'proses' // Default awal
    ]);

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat!');
}
    public function show($id)
{
    // Ambil data transaksi beserta relasi pelanggan & layanannya
    $transaksi = \App\Models\Transaksi::with(['pelanggan', 'layanan'])->findOrFail($id);
    return view('transaksi.show', compact('transaksi'));
}
}