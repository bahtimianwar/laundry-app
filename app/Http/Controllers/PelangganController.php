<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // 1. Nampilin daftar pelanggan
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggans'));
    }

    // 2. Nampilin form tambah
    public function create()
    {
        return view('pelanggan.create');
    }

    // 3. Simpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'nomor_hp' => 'required',
        ]);

        Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambah!');
    }
}