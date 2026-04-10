@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Daftar Layanan Laundry</h3>
    <a href="{{ route('layanan.create') }}" class="btn btn-primary">+ Tambah Layanan</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nama Layanan</th>
                    <th>Harga /Kg</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($layanans as $l)
                <tr>
                    <td>{{ $l->id }}</td>
                    <td>{{ $l->nama_layanan }}</td>
                    <td>Rp {{ number_format($l->harga_perkg, 0, ',', '.') }}</td>
                    <td class="text-center">
                        <form action="{{ route('layanan.destroy', $l->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada data layanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection