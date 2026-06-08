<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PemeriksaanMata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf; // 👈 1. TAMBAHKAN IMPORT INI DI ATAS

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
                'message' => $validator->errors()->first(),
                'errors'  => $validator->errors()
            ], 422);
        }

        try {
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
        ], [
            'email.unique' => 'Email ini sudah terdaftar.',
            'password.min' => 'Password minimal harus 8 karakter.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
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
                'message' => $validator->errors()->first(),
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

        $user->tokens()->delete();
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

    /**
     * 👈 2. METHOD BARU UNTUK CETAK PDF HASIL DAN ANJURAN DOKTER
     */
    public function exportPdf($id, Request $request)
    {
        // Cari data pemeriksaan dan pastikan ini milik user yang sedang login
        $pemeriksaan = PemeriksaanMata::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$pemeriksaan) {
            return response()->json([
                'success' => false,
                'message' => 'Data rekam medis tidak ditemukan atau bukan milik Anda.'
            ], 404);
        }

        $user = $request->user();
        $kesimpulanKondisi = "";
        $saranMedis = "";

        // Logika penentuan keadaan mata dan arahan periksa dokter terdekat
        if ($pemeriksaan->status_medis === 'Normal') {
            $kesimpulanKondisi = "Berdasarkan hasil skrining, kemampuan persepsi warna Anda berfungsi dengan sangat baik. Tidak ditemukan adanya tanda-tanda buta warna pada pelat Ishihara yang diujikan.";
            $saranMedis = "Pertahankan kondisi kesehatan mata Anda dengan mengonsumsi makanan kaya vitamin A. Disarankan untuk tetap melakukan pemeriksaan mata rutin ke dokter spesialis mata atau optik terdekat minimal 1 tahun sekali untuk deteksi dini kesehatan mata secara umum.";
        } elseif ($pemeriksaan->status_medis === 'Perlu Pemeriksaan Lanjutan') {
            $kesimpulanKondisi = "Hasil skrining mendeteksi adanya keraguan atau kesalahan parsial saat Anda mengidentifikasi angka pada pelat Ishihara. Kondisi ini bisa dipengaruhi oleh kelelahan mata akut atau indikasi awal penurunan kepekaan warna.";
            $saranMedis = "Sangat disarankan bagi Anda untuk meluangkan waktu melakukan pemeriksaan konfirmasi langsung ke Dokter Spesialis Mata (Sp.M) di puskesmas, klinik, atau rumah sakit terdekat. Dokter akan melakukan evaluasi komprehensif guna memastikan apakah ini murni kelelahan mata atau gejala buta warna sebagian.";
        } else {
            // Indikasi Buta Warna
            $kesimpulanKondisi = "Hasil skrining menunjukkan kecenderungan kuat adanya hambatan atau ketidakmampuan dalam membaca spektrum warna tertentu secara akurat (Indikasi Buta Warna).";
            $saranMedis = "Mengingat hasil skrining menunjukkan indikasi buta warna, mohon segera jadwalkan kunjungan ke Dokter Spesialis Mata (Sp.M) terdekat di kota Anda. Pemeriksaan klinis lebih lanjut (seperti Uji Farnsworth-Munsell) sangat diperlukan di rumah sakit atau klinik mata untuk mendapatkan diagnosis medis resmi serta arahan tindak lanjut yang tepat untuk menunjang aktivitas harian Anda.";
        }

        $data = [
            'title' => 'SURAT HASIL SKRINING KESEHATAN MATA DIGITAL',
            'date' => now()->translatedFormat('d F Y'),
            'user' => $user,
            'pemeriksaan' => $pemeriksaan,
            'kesimpulan' => $kesInterior ?? $kesimpulanKondisi,
            'saran' => $saranMedis
        ];

        // Melempar data ke halaman cetak pdf.pemeriksaan
        $pdf = Pdf::loadView('pdf.pemeriksaan', $data);
        
        return $pdf->stream('VisionMe_Hasil_'.$pemeriksaan->id.'.pdf');
    }
}