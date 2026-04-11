@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="mb-0 text-gray-800">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}! 👋</h3>
        <p class="text-muted mt-1">Berikut ringkasan operasional laundry kamu hari ini.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm border-start border-4 border-primary h-100 py-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase fw-bold text-primary mb-1" style="font-size: 0.85rem;">
                            Total Pelanggan
                        </div>
                        <div class="h3 mb-0 fw-bold text-dark">{{ $total_pelanggan }}</div>
                    </div>
                    <div class="text-primary opacity-25">
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm border-start border-4 border-success h-100 py-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase fw-bold text-success mb-1" style="font-size: 0.85rem;">
                            Total Transaksi
                        </div>
                        <div class="h3 mb-0 fw-bold text-dark">{{ $total_transaksi }}</div>
                    </div>
                    <div class="text-success opacity-25">
                        <i class="fas fa-tshirt fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm border-start border-4 border-info h-100 py-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase fw-bold text-info mb-1" style="font-size: 0.85rem;">
                            Total Pendapatan
                        </div>
                        <div class="h3 mb-0 fw-bold text-dark">Rp {{ number_format($total_pendapatan, 0, ',', '.') }}</div>
                    </div>
                    <div class="text-info opacity-25">
                        <i class="fas fa-wallet fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection