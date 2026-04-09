<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Tampilkan daftar pelanggan
    public function index() {
        $pelanggans = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggans'));
    }

    // Simpan data pelanggan baru
    public function store(Request $request) {
        $request->validate([
            'nama_pelanggan' => 'required',
            'nomor_hp' => 'required|numeric',
        ]);

        Pelanggan::create($request->all());
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambah!');
    }

    // Hapus pelanggan
    public function destroy(Pelanggan $pelanggan) {
        $pelanggan->delete();
        return back()->with('success', 'Pelanggan berhasil dihapus!');
    }
}