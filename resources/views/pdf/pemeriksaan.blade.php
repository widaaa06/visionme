<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        /* Pengaturan Kertas Cetak A4 */
        @page {
            size: A4;
            margin: 2cm;
        }
        
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #222;
            line-height: 1.6;
            font-size: 11pt;
            margin: 0;
            padding: 0;
        }

        /* Kop Surat Resmi (Header) */
        .kop-surat {
            text-align: center;
            border-bottom: 3px double #0284c7;
            padding-bottom: 12px;
            margin-bottom: 30px;
        }
        .kop-surat h2 {
            margin: 0;
            color: #0284c7;
            font-size: 22pt;
            letter-spacing: 1px;
            font-weight: bold;
        }
        .kop-surat p {
            margin: 4px 0 0 0;
            color: #555;
            font-size: 10pt;
            font-style: italic;
        }

        /* Judul Dokumen */
        .judul-dokumen {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 35px;
            color: #111;
            letter-spacing: 0.5px;
        }

        /* Pembatas Sub-Section */
        .section-title {
            font-weight: bold;
            font-size: 11pt;
            color: #0284c7;
            margin-top: 25px;
            margin-bottom: 10px;
            text-transform: uppercase;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 4px;
        }

        /* Tabel Identitas & Hasil */
        .table-data {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table-data td {
            padding: 6px 0;
            vertical-align: top;
        }
        .table-data td.label {
            width: 30%;
            color: #555;
        }
        .table-data td.titik-dua {
            width: 3%;
            color: #333;
        }
        .table-data td.value {
            width: 67%;
            font-weight: 500;
            color: #111;
        }

        /* Badge Status Medis Yang Jelas */
        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            font-weight: bold;
            border-radius: 4px;
            font-size: 10pt;
            text-transform: uppercase;
        }
        .status-normal {
            background-color: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }
        .status-warning {
            background-color: #fef9c3;
            color: #854d0e;
            border: 1px solid #fef08a;
        }
        .status-danger {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        /* Kotak Deskripsi Diagnosis & Saran */
        .box-konten {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 15px;
            border-radius: 6px;
            margin-top: 5px;
            text-align: justify;
        }
        .box-konten p {
            margin: 0;
            font-size: 10.5pt;
            color: #334155;
        }

        /* Bagian Tanda Tangan (Footer) */
        .footer-nota {
            margin-top: 60px;
            width: 100%;
        }
        .footer-nota table {
            width: 100%;
        }
        .footer-nota td {
            text-align: right;
            font-size: 11pt;
        }
        .footer-nota .tempat-tanggal {
            margin-bottom: 65px;
        }
        .footer-nota .nama-ttd {
            font-weight: bold;
            text-decoration: underline;
            color: #111;
        }
        .footer-nota .instansi {
            font-size: 9.5pt;
            color: #64748b;
            margin-top: 2px;
        }
    </style>
</head>
<body>

    <div class="kop-surat">
        <h2>VISIONME DIGITAL HEALTH</h2>
        <p>Layanan Aplikasi Skrining Kesehatan Mata Mandiri Berbasis Mobile</p>
    </div>

    <div class="judul-dokumen">
        {{ $title }}
    </div>

    <div class="section-title">Identitas Pengguna</div>
    <table class="table-data">
        <tr>
            <td class="label">Nama Lengkap</td>
            <td class="titik-dua">:</td>
            <td class="value">{{ $user->name }}</td>
        </tr>
        <tr>
            <td class="label">Alamat Email</td>
            <td class="titik-dua">:</td>
            <td class="value">{{ $user->email }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal Pemeriksaan</td>
            <td class="titik-dua">:</td>
            <td class="value">{{ \Carbon\Carbon::parse($pemeriksaan->created_at)->translatedFormat('d F Y H:i') }} WIB</td>
        </tr>
    </table>

    <div class="section-title">Hasil Skrining Sistem</div>
    <table class="table-data">
        <tr>
            <td class="label">Kategori Uji</td>
            <td class="titik-dua">:</td>
            <td class="value">{{ $pemeriksaan->kategori_uji }}</td>
        </tr>
        <tr>
            <td class="label">Skor Pengukuran</td>
            <td class="titik-dua">:</td>
            <td class="value">{{ $pemeriksaan->hasil_pengukuran }} Benar</td>
        </tr>
        <tr>
            <td class="label">Kesimpulan Medis</td>
            <td class="titik-dua">:</td>
            <td class="value">
                <span class="status-badge 
                    {{ $pemeriksaan->status_medis === 'Normal' ? 'status-normal' : ($pemeriksaan->status_medis === 'Perlu Pemeriksaan Lanjutan' ? 'status-warning' : 'status-danger') }}">
                    {{ $pemeriksaan->status_medis }}
                </span>
            </td>
        </tr>
    </table>

    <div class="section-title">Keterangan Kondisi Mata</div>
    <div class="box-konten">
        <p>{{ $kesimpulan }}</p>
    </div>

    <div class="section-title">Rekomendasi Tindakan Medis</div>
    <div class="box-konten" style="border-left: 4px solid #0284c7; background-color: #f0f9ff;">
        <p><strong>Saran Keberlanjutan:</strong><br>{{ $saran }}</p>
    </div>

    <div class="footer-nota">
        <table>
            <tr>
                <td style="width: 60%;"></td> 
                <td style="width: 40%; text-align: center;">
                    <div class="tempat-tanggal">Indramayu, {{ $date }}</div>
                    <div class="nama-ttd">VisionMe Health Analytics</div>
                    <div class="instansi">Sistem Validasi Otomatis</div>
                </td>
            </tr>
        </table>
    </div>

</body>
</html>