@extends('layouts.app')

@section('content')
<h3>Tambah Pelanggan Baru</h3>
<div class="card col-md-6">
    <div class="card-body">
        <form action="{{ route('pelanggan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nomor HP</label>
                <input type="text" name="nomor_hp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection