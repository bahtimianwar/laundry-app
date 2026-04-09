<?php
namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index() {
        $layanans = Layanan::all();
        return view('layanan.index', compact('layanans'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_layanan' => 'required',
            'harga_perkg' => 'required|numeric',
        ]);

        Layanan::create($request->all());
        return redirect()->route('layanan.index');
    }
}