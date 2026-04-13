@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Data Transaksi Laundry</h3>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">+ Transaksi Baru</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table">
    <thead>
        <tr>
            <th>Tanggal Masuk</th>
            <th>Pelanggan</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksis as $t)
        <tr>
            <td>{{ $t->created_at->format('d/m/Y') }}</td>
            <td>{{ $t->pelanggan->nama_pelanggan }}</td>
            <td>Rp {{ number_format($t->total_harga) }}</td>
            
            <td>
                <div class="d-flex align-items-center gap-2">
                    @if($t->status == 'proses')
                        <span class="badge bg-warning text-dark">PROSES</span>
                        <form action="{{ route('transaksi.updateStatus', $t->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="selesai">
                            <button type="submit" class="btn btn-sm btn-success py-0" style="font-size: 0.7rem;">
                                <i class="fas fa-check"></i> Selesai
                            </button>
                        </form>
                    @elseif($t->status == 'selesai')
                        <span class="badge bg-success">SELESAI</span>
                    @else
                        <span class="badge bg-primary">DIAMBIL</span>
                    @endif
                </div>
            </td>

            <td class="text-center">
                <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-sm btn-info text-white">
                    <i class="fas fa-eye"></i> Detail
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
</div>
@endsection