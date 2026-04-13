@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Form Transaksi Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('transaksi.store') }}" method="POST">
    @csrf
    <div class="card card-custom p-4">
        <h5>Input Transaksi Baru</h5>
        <hr>
        <div class="mb-3">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control" placeholder="Masukkan nama..." required>
        </div>
        <div class="mb-3">
            <label>Nomor HP</label>
            <input type="text" name="nomor_hp" class="form-control" placeholder="08xxxx..." required>
        </div>
        
        <div class="mb-3">
            <label class="fw-bold">Alamat Pelanggan</label>
            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat..." required></textarea>
        </div>
        <div class="mb-3">
            <label>Layanan</label>
            <select name="layanan_id" class="form-control" required>
                @foreach($layanans as $l)
                    <option value="{{ $l->id }}">{{ $l->nama_layanan }} - Rp {{ number_format($l->harga_perkg) }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label>Berat (Kg)</label>
            <input type="number" name="berat" class="form-control" step="0.1" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
    </div>
</form>
            </div>
        </div>
    </div>
</div>
@endsection