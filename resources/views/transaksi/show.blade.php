@extends('layouts.app')

@section('content')
<h3>Detail Transaksi #{{ $transaksi->id }}</h3>
<div class="card col-md-6 shadow-sm">
    <div class="card-body">
        <table class="table table-borderless">
            <tr>
                <th>Nama Pelanggan</th>
                <td>: {{ $transaksi->pelanggan->nama_pelanggan }}</td>
            </tr>
            <tr>
                <th>Layanan</th>
                <td>: {{ $transaksi->layanan->nama_layanan }}</td>
            </tr>
            <tr>
                <th>Berat</th>
                <td>: {{ $transaksi->berat }} Kg</td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td>: <strong>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</strong></td>
            </tr>
            <tr>
                <th>Status</th>
                <td>: <span class="badge bg-primary">{{ strtoupper($transaksi->status) }}</span></td>
            </tr>
        </table>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection