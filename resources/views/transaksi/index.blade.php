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
                    <th>Tanggal Masuk</th>
                    <th>Pelanggan</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
    @forelse($transaksis as $t)
    <tr>
        <td>{{ $t->created_at->format('d/m/Y') }}</td> 
        
        <td>{{ $t->pelanggan->nama_pelanggan }}</td>
        
        <td>Rp {{ number_format($t->total_harga, 0, ',', '.') }}</td>
        
        <td>
            @if($t->status == 'proses')
                <span class="badge bg-warning text-dark">PROSES</span>
            @elseif($t->status == 'selesai')
                <span class="badge bg-success">SELESAI</span>
            @else
                <span class="badge bg-secondary">DIAMBIL</span>
            @endif
        </td>
        
        <td class="text-center">
            <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-sm btn-info text-white">
                <i class="fas fa-eye"></i> Detail
            </a>
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