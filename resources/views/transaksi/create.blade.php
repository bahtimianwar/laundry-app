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
    <label>Pilih Pelanggan</label>
    <select name="pelanggan_id" class="form-control" required>
        @foreach($pelanggans as $p)
            <option value="{{ $p->id }}">{{ $p->nama_pelanggan }}</option>
        @endforeach
    </select>

    <label>Pilih Layanan</label>
    <select name="layanan_id" class="form-control" required>
        @foreach($layanans as $l)
            <option value="{{ $l->id }}">{{ $l->nama_layanan }} (Rp {{ $l->harga_perkg }}/kg)</option>
        @endforeach
    </select>

    <label>Berat (Kg)</label>
    <input type="number" step="0.01" name="berat" class="form-control" required>

    <button type="submit" class="btn btn-primary mt-3">Buat Nota</button>
</form>
            </div>
        </div>
    </div>
</div>
@endsection