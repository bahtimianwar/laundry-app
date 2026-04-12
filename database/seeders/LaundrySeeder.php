<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;
use App\Models\Layanan;

class LaundrySeeder extends Seeder
{
    public function run()
    {
        // 1. Data Dummy Pelanggan
        $p1 = Pelanggan::create(['nama_pelanggan' => 'Udin Sedunia', 'nomor_hp' => '08123456789', 'alamat' => 'Jl. Kenangan']);
        $p2 = Pelanggan::create(['nama_pelanggan' => 'Siti Laundry', 'nomor_hp' => '08523344556', 'alamat' => 'Gg. Kelinci']);
        $p3 = Pelanggan::create(['nama_pelanggan' => 'Budi Setrika', 'nomor_hp' => '08778899001', 'alamat' => 'Jl. Lurus No. 5']);
        $p4 = Pelanggan::create(['nama_pelanggan' => 'Ani Wangi', 'nomor_hp' => '08112233445', 'alamat' => 'Perum Indah Blok A']);
        $p5 = Pelanggan::create(['nama_pelanggan' => 'Eko Bersih', 'nomor_hp' => '08990011223', 'alamat' => 'Jl. Baru Sekali']);

        // 2. Data Dummy Layanan (Sesuai gambar lu sebelumnya)
        $l1 = Layanan::create(['nama_layanan' => 'Cuci', 'harga_perkg' => 5000]);
        $l2 = Layanan::create(['nama_layanan' => 'Setrika', 'harga_perkg' => 4000]);
        $l3 = Layanan::create(['nama_layanan' => 'Cuci dan Setrika', 'harga_perkg' => 8000]);
        $l4 = Layanan::create(['nama_layanan' => 'Laundry Express', 'harga_perkg' => 15000]);
        $l5 = Layanan::create(['nama_layanan' => 'Cuci Karpet', 'harga_perkg' => 25000]);
    }
}