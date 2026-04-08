<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::create('pelanggans', function (Blueprint $table) {
        $table->id(); // Ini otomatis jadi Primary Key (id_pelanggan)
        $table->string('nama_pelanggan');
        $table->string('nomor_hp');
        $table->text('alamat');
        $table->timestamps(); // Buat nyatet kapan data dibuat & diupdate
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
