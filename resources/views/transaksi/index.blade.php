@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Data Transaksi Laundry</h3>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">+ Transaksi Baru</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Tgl Masuk</th>
                    <th>Pelanggan</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksis as $t)
                <tr>
                    <td>{{ date('d/m/Y', strtotime($t->tgl_masuk)) }}</td>
                    <td>{{ $t->pelanggan->nama_pelanggan }}</td>
                    <td>Rp {{ number_format($t->total_harga, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge {{ $t->status_laundry == 'proses' ? 'bg-warning' : 'bg-success' }}">
                            {{ strtoupper($t->status_laundry) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada transaksi hari ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection