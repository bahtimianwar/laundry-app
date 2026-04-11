@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <h3>Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
        <p class="text-muted">Berikut ringkasan operasional laundry kamu hari ini.</p>
    </div>

    <div class="col-md-4">
        <div class="card bg-primary text-white shadow-sm">
            <div class="card-body">
                <h5>Total Pelanggan</h5>
                <h2>{{ $total_pelanggan }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-success text-white shadow-sm">
            <div class="card-body">
                <h5>Total Transaksi</h5>
                <h2>{{ $total_transaksi }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-info text-white shadow-sm">
            <div class="card-body">
                <h5>Total Pendapatan</h5>
                <h2>Rp {{ number_format($total_pendapatan, 0, ',', '.') }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection