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
                    
                    <div class="mb-3">
                        <label class="form-label">Pilih Pelanggan</label>
                        <select name="pelanggan_id" class="form-select" required>
                            <option value="">-- Pilih Nama Pelanggan --</option>
                            @foreach($pelanggans as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_pelanggan }} ({{ $p->nomor_hp }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pilih Layanan</label>
                            <select name="layanan_id" class="form-select" required>
                                <option value="">-- Pilih Layanan --</option>
                                @foreach($layanans as $l)
                                    <option value="{{ $l->id }}">{{ $l->nama_layanan }} - Rp {{ number_format($l->harga_perkg) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Berat (Kg)</label>
                            <input type="number" name="berat_laundry" step="0.1" class="form-control" placeholder="Contoh: 3.5" required>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted small">* Total harga akan dihitung otomatis oleh sistem.</p>
                        <div>
                            <button type="submit" class="btn btn-primary px-5">Simpan Transaksi</button>
                            <a href="{{ route('transaksi.index') }}" class="btn btn-light">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection