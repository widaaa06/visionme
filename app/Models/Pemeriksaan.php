<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    // Daftarkan kolom yang boleh diisi lewat form web admin
    protected $fillable = [
        'user_id',
        'kategori_uji',
        'hasil_pengukuran',
        'status_medis',
    ];

    // Opsional: Relasi balik ke model User jika dibutuhkan nanti
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}