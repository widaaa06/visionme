<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanMata extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kategori_uji',
        'hasil_pengukuran',
        'status_medis'
    ];

    // Relasi balik ke User (Biar tahu ini pemeriksaan milik siapa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}