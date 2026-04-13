<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    // Nama tabel lu di phpMyAdmin tadi
    protected $table = 'detail_transaksis';

    // Kolom-kolom yang boleh diisi (sesuai gambar lu)
    protected $fillable = [
        'transaksi_id',
        'layanan_id',
        'berat_laundry', // Sesuai kolom #4 di gambar
        'subtotal_harga', // Sesuai kolom #5 di gambar
    ];

    // Relasi ke tabel Transaksi (induk nota)
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    // Relasi ke tabel Layanan (biar tau layanannya apa)
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}