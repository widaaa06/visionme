<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'no_rekam_medis',
        'jenis_kelamin',
        'umur',
    ];
}