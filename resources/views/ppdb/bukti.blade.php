<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Bukti Pendaftaran - {{ $pendaftaran->nomor_pendaftaran }}
    </title>

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            background: #eef2f7;
            font-family: Arial, Helvetica, sans-serif;
            color: #222;
            font-size: 12px;
            line-height: 1.5;
        }

        /* =====================================================
           TOOLBAR
        ===================================================== */

        .toolbar {
            width: 794px;
            margin: 25px auto 15px auto;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 145px;
            height: 42px;
            padding: 0 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-pdf {
            background: #b42318;
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(180, 35, 24, 0.20);
        }

        .btn-print {
            background: #1f4e79;
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(31, 78, 121, 0.20);
        }

        /* =====================================================
           KERTAS A4
        ===================================================== */

        .paper {
            width: 794px;
            min-height: 1123px;
            margin: 0 auto 30px auto;
            padding: 55px 60px;
            background: #ffffff;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.12);
            border-radius: 2px;
        }

        /* =====================================================
           KOP SEKOLAH
        ===================================================== */

        .kop {
            width: 100%;
            border-bottom: 3px solid #1f4e79;
            padding-bottom: 12px;
        }

        .kop-table {
            width: 100%;
            border-collapse: collapse;
        }

        .logo-cell {
            width: 90px;
            text-align: center;
            vertical-align: middle;
        }

        .logo {
            width: 75px;
            height: 75px;
            object-fit: contain;
        }

        .kop-text {
            text-align: center;
            vertical-align: middle;
        }

        .school-name {
            font-size: 20px;
            font-weight: bold;
            color: #1f4e79;
            letter-spacing: 0.5px;
        }

        .ppdb-title {
            margin-top: 5px;
            font-size: 13px;
            font-weight: bold;
        }

        .school-year {
            margin-top: 3px;
            font-size: 11px;
            color: #555555;
        }

        .spacer {
            width: 90px;
        }

        /* =====================================================
           JUDUL
        ===================================================== */

        .document-title {
            text-align: center;
            margin-top: 25px;
        }

        .document-title h1 {
            margin: 0;
            font-size: 19px;
            color: #1f4e79;
            letter-spacing: 0.7px;
        }

        .document-title-line {
            width: 55px;
            height: 3px;
            background: #1f4e79;
            margin: 8px auto 7px auto;
        }

        .document-subtitle {
            text-align: center;
            margin-top: 5px;
            font-size: 10px;
            color: #666666;
        }

        /* =====================================================
           NOMOR PENDAFTARAN
        ===================================================== */

        .registration-box {
            margin-top: 22px;
            padding: 13px;
            text-align: center;
            border: 1px solid #c8d5e2;
            background: #f4f8fc;
            border-radius: 6px;
        }

        .registration-label {
            font-size: 9px;
            font-weight: bold;
            color: #666666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .registration-number {
            margin-top: 4px;
            font-size: 18px;
            font-weight: bold;
            color: #1f4e79;
            letter-spacing: 1.5px;
        }

        /* =====================================================
           SECTION
        ===================================================== */

        .section-title {
            margin-top: 19px;
            padding: 8px 11px;
            background: #1f4e79;
            color: #ffffff;
            font-size: 11px;
            font-weight: bold;
            border-radius: 4px 4px 0 0;
        }

        /* =====================================================
           DATA PESERTA
        ===================================================== */

        .student-layout {
            width: 100%;
            border-collapse: collapse;
        }

        .student-data {
            width: 78%;
            vertical-align: top;
            padding: 0 12px 0 0;
        }

        .photo-cell {
            width: 22%;
            vertical-align: top;
            text-align: center;
            padding-top: 5px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table td {
            border: 1px solid #d6dce2;
            padding: 8px 10px;
            vertical-align: top;
            font-size: 11px;
        }

        .data-table .label {
            width: 35%;
            background: #f8fafc;
            font-weight: bold;
            color: #3b4652;
        }

        /* =====================================================
           FOTO
        ===================================================== */

        .photo {
            width: 105px;
            height: 135px;
            object-fit: cover;
            border: 1px solid #555555;
            padding: 3px;
            background: #ffffff;
        }

        .photo-empty {
            width: 105px;
            height: 135px;
            border: 1px solid #aaaaaa;
            margin: 0 auto;
            padding-top: 50px;
            font-size: 9px;
            color: #777777;
            text-align: center;
        }

        .photo-caption {
            margin-top: 6px;
            font-size: 8px;
            color: #666666;
            text-align: center;
        }

        /* =====================================================
           STATUS
        ===================================================== */

        .status-box {
            margin-top: 8px;
            padding: 13px;
            text-align: center;
            border: 1px solid #d6b656;
            background: #fffbea;
            border-radius: 4px;
        }

        .status-label {
            font-size: 9px;
            font-weight: bold;
            color: #777777;
            text-transform: uppercase;
        }

        .status-value {
            margin-top: 4px;
            font-size: 14px;
            font-weight: bold;
            color: #8a6500;
        }

        /* =====================================================
           CATATAN
        ===================================================== */

        .note {
            margin-top: 15px;
            padding: 11px 13px;
            border-left: 4px solid #1f4e79;
            background: #f7f9fb;
            font-size: 9px;
            line-height: 1.7;
        }

        .note-title {
            margin-bottom: 4px;
            font-weight: bold;
            color: #1f4e79;
        }

        /* =====================================================
           TANDA TANGAN
        ===================================================== */

        .signature {
            width: 100%;
            margin-top: 30px;
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
        }

        .signature-left {
            width: 55%;
        }

        .signature-right {
            width: 45%;
            text-align: center;
            vertical-align: top;
            font-size: 11px;
        }

        .signature-space {
            height: 62px;
        }

        .signature-name {
            font-weight: bold;
            text-decoration: underline;
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            margin-top: 25px;
            padding-top: 8px;
            border-top: 1px solid #cccccc;
            text-align: center;
            font-size: 8px;
            color: #777777;
        }

        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media screen and (max-width: 850px) {

            body {
                padding: 10px;
            }

            .toolbar {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .paper {
                width: 100%;
                min-height: auto;
                padding: 30px;
            }

        }

        /* =====================================================
           PRINT
        ===================================================== */

        @media print {

            @page {
                size: A4;
                margin: 0;
            }

            html,
            body {
                width: 210mm;
                background: #ffffff;
            }

            body {
                padding: 0;
            }

            .toolbar {
                display: none !important;
            }

            .paper {
                width: 210mm;
                min-height: 297mm;
                margin: 0;
                padding: 18mm;
                box-shadow: none;
                border-radius: 0;
            }

        }
    </style>

</head>


<body>


    <!-- =====================================================
         TOMBOL DOWNLOAD & CETAK
    ====================================================== -->

    <div class="toolbar">

        <a href="{{ route('ppdb.pdf', $pendaftaran->id) }}" class="btn btn-pdf" target="_blank">
            Download PDF
        </a>

        <button type="button" class="btn btn-print" onclick="window.print()">
            Cetak Bukti
        </button>

    </div>


    <!-- =====================================================
         KERTAS A4
    ====================================================== -->

    <div class="paper">


        @php

            /*
            |--------------------------------------------------------------------------
            | FORMAT BULAN INDONESIA
            |--------------------------------------------------------------------------
            */

            $bulan = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember',
            ];

            /*
            |--------------------------------------------------------------------------
            | TANGGAL LAHIR
            |--------------------------------------------------------------------------
            */

            $tanggalLahir = '-';

            if (!empty($pendaftaran->tanggal_lahir)) {
                try {
                    $tanggalLahirData = \Carbon\Carbon::parse($pendaftaran->tanggal_lahir);

                    $tanggalLahir =
                        $tanggalLahirData->format('d') .
                        ' ' .
                        $bulan[(int) $tanggalLahirData->format('m')] .
                        ' ' .
                        $tanggalLahirData->format('Y');
                } catch (\Exception $e) {
                    $tanggalLahir = $pendaftaran->tanggal_lahir;
                }
            }

            /*
            |--------------------------------------------------------------------------
            | TANGGAL CETAK
            |--------------------------------------------------------------------------
            */

            $tanggalCetakData = \Carbon\Carbon::now();

            $tanggalCetak =
                $tanggalCetakData->format('d') .
                ' ' .
                $bulan[(int) $tanggalCetakData->format('m')] .
                ' ' .
                $tanggalCetakData->format('Y');

            /*
            |--------------------------------------------------------------------------
            | LOGO SEKOLAH
            |--------------------------------------------------------------------------
            */

            $logoBase64 = null;

            $logoPath = public_path('assets/images/logo-tk.jpg');

            if (file_exists($logoPath)) {
                $logoBase64 = 'data:image/jpeg;base64,' . base64_encode(file_get_contents($logoPath));
            }

            /*
            |--------------------------------------------------------------------------
            | PAS FOTO
            |--------------------------------------------------------------------------
            */

            $fotoBase64 = null;

            if (!empty($pendaftaran->pas_foto)) {
                $fotoRelativePath = trim($pendaftaran->pas_foto);

                /*
                | Jika database menyimpan:
                | storage/dokumen/foto/xxx.jpg
                | ubah menjadi:
                | dokumen/foto/xxx.jpg
                */

                if (str_starts_with($fotoRelativePath, 'storage/')) {
                    $fotoRelativePath = substr($fotoRelativePath, 8);
                }

                /*
                | Hapus slash di awal
                */

                $fotoRelativePath = ltrim($fotoRelativePath, '/\\');

                /*
                | Lokasi file sebenarnya
                */

                $fotoPath = storage_path('app/public/' . $fotoRelativePath);

                /*
                | Cek file
                */

                if (file_exists($fotoPath)) {
                    $extension = strtolower(pathinfo($fotoPath, PATHINFO_EXTENSION));

                    if ($extension === 'jpg' || $extension === 'jpeg') {
                        $mimeType = 'jpeg';
                    } elseif ($extension === 'png') {
                        $mimeType = 'png';
                    } else {
                        $mimeType = null;
                    }

                    if ($mimeType) {
                        $fotoBase64 =
                            'data:image/' . $mimeType . ';base64,' . base64_encode(file_get_contents($fotoPath));
                    }
                }
            }

        @endphp


        <!-- =================================================
             KOP SEKOLAH
        ================================================== -->

        <div class="kop">

            <table class="kop-table">

                <tr>

                    <td class="logo-cell">

                        @if ($logoBase64)
                            <img src="{{ $logoBase64 }}" class="logo" alt="Logo TK Mekar Tigo Jangko">
                        @endif

                    </td>


                    <td class="kop-text">

                        <div class="school-name">
                            TK MEKAR TIGO JANGKO
                        </div>

                        <div class="ppdb-title">
                            PENERIMAAN PESERTA DIDIK BARU (PPDB)
                        </div>

                        <div class="school-year">
                            TAHUN AJARAN 2026/2027
                        </div>

                    </td>


                    <td class="spacer"></td>

                </tr>

            </table>

        </div>


        <!-- =================================================
             JUDUL
        ================================================== -->

        <div class="document-title">

            <h1>
                BUKTI PENDAFTARAN
            </h1>

            <div class="document-title-line"></div>

        </div>


        <div class="document-subtitle">

            Dokumen resmi bukti pendaftaran
            peserta didik baru TK Mekar Tigo Jangko

        </div>


        <!-- =================================================
             NOMOR PENDAFTARAN
        ================================================== -->

        <div class="registration-box">

            <div class="registration-label">
                Nomor Pendaftaran
            </div>

            <div class="registration-number">

                {{ $pendaftaran->nomor_pendaftaran }}

            </div>

        </div>


        <!-- =================================================
             A. DATA CALON PESERTA DIDIK
        ================================================== -->

        <div class="section-title">

            A. DATA CALON PESERTA DIDIK

        </div>


        <table class="student-layout">

            <tr>


                <td class="student-data">

                    <table class="data-table">

                        <tr>

                            <td class="label">
                                Nama Lengkap
                            </td>

                            <td>
                                {{ $pendaftaran->nama_lengkap ?? '-' }}
                            </td>

                        </tr>


                        <tr>

                            <td class="label">
                                Tempat Lahir
                            </td>

                            <td>
                                {{ $pendaftaran->tempat_lahir ?? '-' }}
                            </td>

                        </tr>


                        <tr>

                            <td class="label">
                                Tanggal Lahir
                            </td>

                            <td>
                                {{ $tanggalLahir }}
                            </td>

                        </tr>


                        <tr>

                            <td class="label">
                                Jenis Kelamin
                            </td>

                            <td>
                                {{ $pendaftaran->jenis_kelamin ?? '-' }}
                            </td>

                        </tr>

                    </table>

                </td>


                <!-- FOTO -->

                <td class="photo-cell">

                    @if ($fotoBase64)
                        <img src="{{ $fotoBase64 }}" class="photo" alt="Pas Foto {{ $pendaftaran->nama_lengkap }}">
                    @else
                        <div class="photo-empty">

                            PAS FOTO

                            <br>

                            TIDAK TERSEDIA

                        </div>
                    @endif


                    <div class="photo-caption">

                        Pas Foto Calon Peserta Didik

                    </div>

                </td>

            </tr>

        </table>


        <!-- =================================================
             B. DATA ORANG TUA
        ================================================== -->

        <div class="section-title">

            B. DATA ORANG TUA / WALI

        </div>


        <table class="data-table">

            <tr>

                <td class="label">
                    Nama Ayah
                </td>

                <td>
                    {{ $pendaftaran->nama_ayah ?? '-' }}
                </td>

            </tr>


            <tr>

                <td class="label">
                    Nama Ibu
                </td>

                <td>
                    {{ $pendaftaran->nama_ibu ?? '-' }}
                </td>

            </tr>


            <tr>

                <td class="label">
                    Nomor HP
                </td>

                <td>
                    {{ $pendaftaran->nomor_hp ?? '-' }}
                </td>

            </tr>


            <tr>

                <td class="label">
                    Alamat
                </td>

                <td>
                    {{ $pendaftaran->alamat ?? '-' }}
                </td>

            </tr>

        </table>


        <!-- =================================================
             C. STATUS PENDAFTARAN
        ================================================== -->

        <div class="section-title">

            C. STATUS PENDAFTARAN

        </div>


        <div class="status-box">

            <div class="status-label">

                Status Pendaftaran

            </div>


            <div class="status-value">

                {{ $pendaftaran->status ?? 'Menunggu' }}

            </div>

        </div>


        <!-- =================================================
             CATATAN
        ================================================== -->

        <div class="note">

            <div class="note-title">

                Catatan Administrasi

            </div>

            Bukti pendaftaran ini merupakan tanda bahwa
            calon peserta didik telah menyelesaikan proses
            pengajuan pendaftaran PPDB.

            Status pendaftaran masih menunggu proses
            verifikasi oleh pihak TK Mekar Tigo Jangko.

            <br>
            <br>

            Simpan bukti pendaftaran ini sebagai dokumen
            administrasi selama proses PPDB berlangsung.

        </div>


        <!-- =================================================
             TANDA TANGAN
        ================================================== -->

        <div class="signature">

            <table class="signature-table">

                <tr>

                    <td class="signature-left"></td>


                    <td class="signature-right">

                        Tigo Jangko,
                        {{ $tanggalCetak }}

                        <br>
                        <br>

                        Kepala TK Mekar Tigo Jangko


                        <div class="signature-space"></div>


                        <div class="signature-name">

                            ______________________________

                        </div>

                    </td>

                </tr>

            </table>

        </div>


        <!-- =================================================
             FOOTER
        ================================================== -->

        <div class="footer">

            Dokumen ini dibuat secara elektronik melalui
            Sistem Informasi TK Mekar Tigo Jangko.

        </div>


    </div>

</body>

</html>
