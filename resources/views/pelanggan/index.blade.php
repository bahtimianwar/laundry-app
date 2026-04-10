@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Daftar Pelanggan</h3>
    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">+ Tambah Pelanggan</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pelanggans as $p)
                <tr>
                    <td>{{ $p->nama_pelanggan }}</td>
                    <td>{{ $p->nomor_hp }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>
                        <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection