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
    Schema::create('pemeriksaan_matas', function (Blueprint $table) {
        $table->id();
        // Menghubungkan ke tabel users (siapa pasiennya)
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        
        // Jenis tes: 'snellen', 'buta_warna', 'astigmatisme'
        $table->string('kategori_uji'); 
        
        // Hasil detail, misal: 'OD: 20/20, OS: 20/30' atau 'Skor: 12/14'
        $table->string('hasil_pengukuran'); 
        
        // Status medis: 'Normal', 'Buta Warna Parsial', 'Perlu Konsultasi'
        $table->string('status_medis'); 
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_matas');
    }
};
