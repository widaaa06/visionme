<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PemeriksaanMata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PemeriksaanApiController extends Controller
{
    /**
     * Menyimpan data hasil skrining mata dari aplikasi VisionMe.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_uji'     => 'required|string|in:Snellen Chart,Astigmatisme,Buta Warna',
            'hasil_pengukuran' => 'required|string',
            'status_medis'     => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi data gagal.',
                'errors'  => $validator->errors()
            ], 422);
        }

        try {
            // user_id diambil otomatis dari user yang sedang login via token
            $pemeriksaan = PemeriksaanMata::create([
                'user_id'          => $request->user()->id,
                'kategori_uji'     => $request->kategori_uji,
                'hasil_pengukuran' => $request->hasil_pengukuran,
                'status_medis'     => $request->status_medis,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data rekam medis VisionMe berhasil disinkronkan ke server.',
                'data'    => $pemeriksaan
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem internal server.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Register pengguna baru VisionMe.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi pendaftaran gagal.',
                'errors'  => $validator->errors()
            ], 422);
        }

        try {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran akun berhasil! Silakan login untuk masuk.',
                'user'    => [
                    'id'         => $user->id,
                    'name'       => $user->name,
                    'email'      => $user->email,
                    'created_at' => $user->created_at->format('Y-m-d H:i:s')
                ]
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mendaftarkan akun.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Login pengguna VisionMe.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Format email atau password tidak valid.',
                'errors'  => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Kombinasi email atau password salah.'
            ], 401);
        }

        // Hapus token lama agar tidak menumpuk (opsional)
        $user->tokens()->delete();

        // Buat token baru menggunakan Sanctum
        $token = $user->createToken('visionme_mobile')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Autentikasi berhasil! Selamat datang di VisionMe.',
            'token'   => $token,
            'user'    => [
                'id'         => $user->id,
                'name'       => $user->name,
                'email'      => $user->email,
                'created_at' => $user->created_at->format('Y-m-d H:i:s')
            ]
        ], 200);
    }

    /**
     * Logout pengguna.
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil.'
        ], 200);
    }
}