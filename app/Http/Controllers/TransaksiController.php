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

    public function store(Request $request) {
        // 1. Ambil data layanan untuk tahu harganya
        $layanan = Layanan::findOrFail($request->layanan_id);
        
        // 2. Hitung Total Harga (Berat x Harga per KG)
        $total_harga = $request->berat_laundry * $layanan->harga_perkg;

        // 3. Simpan ke tabel Transaksi
        $transaksi = Transaksi::create([
            'pelanggan_id' => $request->pelanggan_id,
            'tgl_masuk' => now(), // Otomatis tanggal hari ini
            'status_laundry' => 'proses',
            'total_harga' => $total_harga,
        ]);

        // 4. Simpan ke tabel Detail Transaksi
        DetailTransaksi::create([
            'transaksi_id' => $transaksi->id,
            'layanan_id' => $layanan->id,
            'berat_laundry' => $request->berat_laundry,
            'subtotal_harga' => $total_harga,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi Berhasil!');
    }
}