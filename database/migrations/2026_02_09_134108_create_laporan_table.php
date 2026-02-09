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
        Schema::create('laporan', function (Blueprint $table) {
        $table->id('id_laporan');

        // Admin yang menarik laporan
        $table->unsignedBigInteger('id_admin');
        $table->foreign('id_admin')->references('id_pengguna')->on('pengguna')->onDelete('cascade');

        $table->string('jenis_laporan'); // Misal: 'harian', 'bulanan', 'pengguna_baru'
        $table->timestamp('tanggal_buat')->useCurrent();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
