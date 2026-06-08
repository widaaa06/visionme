<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pemeriksaan;
use App\Models\User;
use Illuminate\Http\Request;

class VisionMeAppController extends Controller
{
    /**
     * Display the VisionMe Mobile Application Simulator page.
     */
    public function index()
    {
        // Get medicines, or insert/provide default eye-health products if empty
        $products = Obat::all();

        if ($products->isEmpty()) {
            $defaultProducts = [
                [
                    'nama' => 'Insto Dry Eyes Drops',
                    'deskripsi' => 'Formulated to lubricate dry eyes, relieve irritation due to screen glare, dust, and wind.',
                    'harga' => 18500.00,
                    'stok' => 25,
                    'gambar' => 'insto_dry_eyes.png'
                ],
                [
                    'nama' => 'Rohto Cool Eye Drops',
                    'deskripsi' => 'Provides instant cooling sensation to relieve red, itchy, and irritated eyes.',
                    'harga' => 16000.00,
                    'stok' => 40,
                    'gambar' => 'rohto_cool.png'
                ],
                [
                    'nama' => 'Eyevit Eye Vitamin (30 Tablets)',
                    'deskripsi' => 'Nutritional supplement containing Bilberry extract, Lutein, Zeaxanthin, and Vitamin A to maintain optimal vision.',
                    'harga' => 48500.00,
                    'stok' => 15,
                    'gambar' => 'eyevit.png'
                ],
                [
                    'nama' => 'Cendo Xitrol Sterile Drops',
                    'deskripsi' => 'Antibiotic and anti-inflammatory eye drops to treat bacterial infections and minor swelling.',
                    'harga' => 32000.00,
                    'stok' => 12,
                    'gambar' => 'cendo_xitrol.png'
                ],
                [
                    'nama' => 'Blackmores Lutein Defence',
                    'deskripsi' => 'Premium eye health formula containing lutein and zeaxanthin to protect macular health and reduce fatigue.',
                    'harga' => 245000.00,
                    'stok' => 8,
                    'gambar' => 'blackmores_lutein.png'
                ],
                [
                    'nama' => 'Alcon Tears Naturale II',
                    'deskripsi' => 'Artificial tears for sensitive eyes, providing long-lasting moisture and comfort from dryness.',
                    'harga' => 95000.00,
                    'stok' => 18,
                    'gambar' => 'alcon_tears.png'
                ]
            ];

            foreach ($defaultProducts as $prod) {
                Obat::create($prod);
            }
            $products = Obat::all();
        }

        // Get users in case the user wants to simulate logging in as an existing registered user
        $users = User::select('id', 'name', 'email')->get();

        return view('app_simulator', compact('products', 'users'));
    }
}
