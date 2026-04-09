@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h4 class="mb-0">Tambah Jenis Layanan</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('layanan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Layanan</label>
                        <input type="text" name="nama_layanan" class="form-control" placeholder="Contoh: Cuci Setrika" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga per Kilogram</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="harga_perkg" class="form-control" placeholder="Contoh: 7000" required>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success px-4">Simpan</button>
                        <a href="{{ route('layanan.index') }}" class="btn btn-light px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection