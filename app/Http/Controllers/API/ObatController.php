<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index()
    {
        return response()->json(
            Obat::latest()->get()
        );
    }

    public function show($id)
    {
        return response()->json(
            Obat::findOrFail($id)
        );
    }
}