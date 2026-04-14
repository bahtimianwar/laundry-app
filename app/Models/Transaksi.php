<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['pelanggan_id', 'layanan_id', 'berat', 'total_harga', 'status'];

// Biar gampang panggil nama pelanggan & layanan
public function pelanggan() { return $this->belongsTo(Pelanggan::class); }
public function layanan() { return $this->belongsTo(Layanan::class); }
}
