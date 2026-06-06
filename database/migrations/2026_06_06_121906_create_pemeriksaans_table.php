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
    Schema::create('pemeriksaans', function (Blueprint $table) {
        $table->id();
        // Menghubungkan data pemeriksaan dengan id user/pasien
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->string('kategori_uji'); // Snellen Chart, Buta Warna, dll
        $table->string('hasil_pengukuran'); // Contoh: OD: 20/20
        $table->string('status_medis'); // Normal, Miopi, dll
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaans');
    }
};
