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
    // 1. Validasi ditambahin field alamat
    $request->validate([
        'nama_pelanggan' => 'required',
        'nomor_hp' => 'required',
        'alamat' => 'required', // Tambahin validasi alamat
        'layanan_id' => 'required',
        'berat' => 'required|numeric'
    ]);

    // 2. Simpan/Dapatkan data pelanggan
    // Kalau HP belum ada, dia buat baru pake nama & alamat dari input
    $pelanggan = \App\Models\Pelanggan::firstOrCreate(
        ['nomor_hp' => $request->nomor_hp],
        [
            'nama_pelanggan' => $request->nama_pelanggan, 
            'alamat' => $request->alamat // Alamat masuk ke sini
        ]
    );

    // 3. Logika hitung harga & simpan transaksi tetep sama
    $layanan = \App\Models\Layanan::findOrFail($request->layanan_id);
    $total_harga = $layanan->harga_perkg * $request->berat;

    \App\Models\Transaksi::create([
        'pelanggan_id' => $pelanggan->id,
        'layanan_id' => $request->layanan_id,
        'berat' => $request->berat,
        'total_harga' => $total_harga,
        'status' => 'proses'
    ]);

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dicatat! 🔥');
}    
public function show($id)
{
    // Ambil data transaksi beserta relasi pelanggan & layanannya
    $transaksi = \App\Models\Transaksi::with(['pelanggan', 'layanan'])->findOrFail($id);
    return view('transaksi.show', compact('transaksi'));
}
}