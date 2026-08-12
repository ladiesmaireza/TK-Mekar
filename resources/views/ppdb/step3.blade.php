<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Upload Dokumen PPDB - TK Mekar Tigo Jangko</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
            min-height: 100vh;
        }

        .main-container {
            padding-top: 40px;
            padding-bottom: 50px;
        }

        .page-title {
            margin-bottom: 30px;
        }

        .page-title h4 {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .page-title p {
            margin-bottom: 0;
            color: #6c757d;
        }

        /* =========================
           STEP INDICATOR
        ========================= */

        .step-indicator {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }

        .step-number {
            width: 38px;
            height: 38px;
            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 15px;
            font-weight: 700;
        }

        .step-done {
            background-color: #198754;
            color: #ffffff;
        }

        .step-active {
            background-color: #ffc107;
            color: #212529;
        }

        .step-line {
            width: 70px;
            height: 2px;

            background-color: #198754;

            margin-left: 8px;
            margin-right: 8px;
        }

        /* =========================
           CARD
        ========================= */

        .card {
            border: none;
            border-radius: 8px;
        }

        .card-header {
            background-color: #ffc107;
            color: #212529;

            padding: 18px 20px;

            border-radius: 8px 8px 0 0 !important;
        }

        .card-header h4 {
            margin-bottom: 5px;
            font-weight: 700;
        }

        .card-body {
            padding: 25px;
        }

        /* =========================
           UPLOAD BOX
        ========================= */

        .upload-box {
            background-color: #ffffff;

            border: 1px solid #dee2e6;
            border-radius: 8px;

            padding: 18px;
            margin-bottom: 20px;

            transition: 0.2s ease;
        }

        .upload-box:hover {
            border-color: #adb5bd;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
        }

        .form-label {
            margin-bottom: 8px;
        }

        .file-info {
            margin-top: 7px;

            font-size: 13px;
            color: #6c757d;
        }

        .required {
            color: #dc3545;
        }

        .optional {
            color: #6c757d;
            font-weight: normal;
        }

        /* =========================
           FILE INPUT
        ========================= */

        .form-control[type="file"] {
            cursor: pointer;
        }

        .form-control[type="file"]::file-selector-button {
            background-color: #ffc107;
            color: #212529;

            border: none;
            border-right: 1px solid #e0a800;

            padding: 8px 14px;

            font-weight: 600;

            cursor: pointer;
        }

        .form-control[type="file"]::file-selector-button:hover {
            background-color: #ffca2c;
        }

        /* =========================
           PREVIEW
        ========================= */

        .file-preview {
            display: none;

            margin-top: 15px;

            padding: 15px;

            border: 1px solid #dee2e6;
            border-radius: 8px;

            background-color: #f8f9fa;
        }

        .file-preview.show {
            display: block;
        }

        .file-preview img {
            display: block;

            width: 220px;
            height: 220px;

            object-fit: contain;

            margin-bottom: 12px;

            border-radius: 8px;

            border: 1px solid #dee2e6;

            background-color: #ffffff;
        }

        .file-name {
            font-size: 14px;

            font-weight: 600;

            color: #212529;

            word-break: break-word;
        }

        .file-type {
            font-size: 13px;

            color: #6c757d;

            margin-top: 4px;
        }

        /* =========================
           PDF PREVIEW
        ========================= */

        .pdf-preview {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 12px;

            margin-bottom: 12px;

            border: 1px solid #f1b0b7;

            border-radius: 8px;

            background-color: #fff5f5;
        }

        .pdf-icon {
            width: 48px;
            height: 48px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 8px;

            background-color: #dc3545;
            color: #ffffff;

            font-size: 12px;
            font-weight: 700;
        }

        /* =========================
           IMAGE PREVIEW
        ========================= */

        .image-preview-title {
            font-size: 13px;

            color: #198754;

            font-weight: 600;

            margin-bottom: 8px;
        }

        /* =========================
           BUTTON
        ========================= */

        .button-area {
            display: flex;

            justify-content: space-between;

            align-items: center;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 576px) {

            .main-container {
                padding-top: 20px;
            }

            .card-body {
                padding: 18px;
            }

            .step-line {
                width: 30px;
            }

            .button-area {
                flex-direction: column;

                gap: 10px;
            }

            .button-area a,
            .button-area button {
                width: 100%;
            }

            .file-preview img {
                width: 100%;
                height: auto;

                max-height: 250px;
            }

        }
    </style>

</head>


<body>

    <div class="container main-container">

        <div class="row justify-content-center">

            <div class="col-12 col-md-8 col-lg-8">

                <!-- =========================
                 JUDUL
            ========================== -->

                <div class="text-center page-title">

                    <h4>
                        PPDB TK Mekar Tigo Jangko
                    </h4>

                    <p>
                        Pendaftaran Peserta Didik Baru
                    </p>

                </div>


                <!-- =========================
                 STEP INDICATOR
            ========================== -->

                <div class="step-indicator">

                    <div class="step-number step-done">
                        ✓
                    </div>

                    <div class="step-line"></div>

                    <div class="step-number step-done">
                        ✓
                    </div>

                    <div class="step-line"></div>

                    <div class="step-number step-active">
                        3
                    </div>

                </div>


                <!-- =========================
                 CARD
            ========================== -->

                <div class="card shadow-sm">

                    <!-- HEADER -->

                    <div class="card-header">

                        <h4>
                            Step 3 - Upload Dokumen
                        </h4>

                        <small>
                            Lengkapi dokumen persyaratan pendaftaran peserta didik.
                        </small>

                    </div>


                    <!-- BODY -->

                    <div class="card-body">


                        <!-- =========================
                         ERROR VALIDASI
                    ========================== -->

                        @if ($errors->any())

                            <div class="alert alert-danger">

                                <strong>
                                    Terjadi kesalahan.
                                </strong>

                                <ul class="mb-0 mt-2">

                                    @foreach ($errors->all() as $error)
                                        <li>
                                            {{ $error }}
                                        </li>
                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <!-- ERROR SESSION -->

                        @if (session('error'))
                            <div class="alert alert-danger">

                                {{ session('error') }}

                            </div>
                        @endif


                        <!-- =========================
                         PETUNJUK
                    ========================== -->

                        <div class="alert alert-info">

                            <strong>
                                Petunjuk Upload
                            </strong>

                            <br>

                            Silakan pilih dokumen yang akan diunggah.

                            <br>

                            Format dokumen yang diperbolehkan:

                            <strong>
                                JPG, JPEG, PNG, PDF
                            </strong>

                            <br>

                            Ukuran maksimal setiap file:

                            <strong>
                                2 MB
                            </strong>

                        </div>


                        <!-- =========================
                         FORM
                    ========================== -->

                        <form action="{{ route('ppdb.storeStep3') }}" method="POST" enctype="multipart/form-data">

                            @csrf


                            <!-- =====================================
                             AKTA KELAHIRAN
                        ====================================== -->

                            <div class="upload-box">

                                <label for="akta_kelahiran" class="form-label fw-bold">

                                    Akta Kelahiran

                                    <span class="required">
                                        *
                                    </span>

                                </label>


                                <input type="file" id="akta_kelahiran" name="akta_kelahiran"
                                    class="form-control @error('akta_kelahiran') is-invalid @enderror"
                                    accept=".jpg,.jpeg,.png,.pdf" required>


                                @error('akta_kelahiran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror


                                <div class="file-info">

                                    Wajib diunggah.
                                    JPG, JPEG, PNG atau PDF.
                                    Maksimal 2 MB.

                                </div>


                                <div id="preview_akta_kelahiran" class="file-preview"></div>

                            </div>


                            <!-- =====================================
                             KARTU KELUARGA
                        ====================================== -->

                            <div class="upload-box">

                                <label for="kartu_keluarga" class="form-label fw-bold">

                                    Kartu Keluarga

                                    <span class="required">
                                        *
                                    </span>

                                </label>


                                <input type="file" id="kartu_keluarga" name="kartu_keluarga"
                                    class="form-control @error('kartu_keluarga') is-invalid @enderror"
                                    accept=".jpg,.jpeg,.png,.pdf" required>


                                @error('kartu_keluarga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror


                                <div class="file-info">

                                    Wajib diunggah.
                                    JPG, JPEG, PNG atau PDF.
                                    Maksimal 2 MB.

                                </div>


                                <div id="preview_kartu_keluarga" class="file-preview"></div>

                            </div>


                            <!-- =====================================
                             KTP ORANG TUA
                        ====================================== -->

                            <div class="upload-box">

                                <label for="ktp_orang_tua" class="form-label fw-bold">

                                    KTP Orang Tua

                                    <span class="required">
                                        *
                                    </span>

                                </label>


                                <input type="file" id="ktp_orang_tua" name="ktp_orang_tua"
                                    class="form-control @error('ktp_orang_tua') is-invalid @enderror"
                                    accept=".jpg,.jpeg,.png,.pdf" required>


                                @error('ktp_orang_tua')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror


                                <div class="file-info">

                                    Wajib diunggah.
                                    JPG, JPEG, PNG atau PDF.
                                    Maksimal 2 MB.

                                </div>


                                <div id="preview_ktp_orang_tua" class="file-preview"></div>

                            </div>


                            <!-- =====================================
                             IJAZAH PAUD
                        ====================================== -->

                            <div class="upload-box">

                                <label for="ijazah_paud" class="form-label fw-bold">

                                    Ijazah / Sertifikat PAUD

                                    <span class="optional">
                                        (Opsional)
                                    </span>

                                </label>


                                <input type="file" id="ijazah_paud" name="ijazah_paud"
                                    class="form-control @error('ijazah_paud') is-invalid @enderror"
                                    accept=".jpg,.jpeg,.png,.pdf">


                                @error('ijazah_paud')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror


                                <div class="file-info">

                                    Opsional.
                                    JPG, JPEG, PNG atau PDF.
                                    Maksimal 2 MB.

                                </div>


                                <div id="preview_ijazah_paud" class="file-preview"></div>

                            </div>


                            <!-- =====================================
                             PAS FOTO
                        ====================================== -->

                            <div class="upload-box">

                                <label for="pas_foto" class="form-label fw-bold">

                                    Pas Foto Anak

                                    <span class="required">
                                        *
                                    </span>

                                </label>


                                <input type="file" id="pas_foto" name="pas_foto"
                                    class="form-control @error('pas_foto') is-invalid @enderror"
                                    accept=".jpg,.jpeg,.png" required>


                                @error('pas_foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror


                                <div class="file-info">

                                    Wajib diunggah.
                                    JPG, JPEG atau PNG.
                                    Maksimal 2 MB.

                                </div>


                                <div id="preview_pas_foto" class="file-preview"></div>

                            </div>


                            <!-- =========================
                             PERNYATAAN
                        ========================== -->

                            <hr class="my-4">


                            <div class="form-check mb-4">

                                <input type="checkbox"
                                    class="form-check-input @error('persetujuan') is-invalid @enderror" id="persetujuan"
                                    name="persetujuan" value="1" required>


                                <label for="persetujuan" class="form-check-label">

                                    Saya menyatakan bahwa data dan dokumen
                                    yang saya isi/upload adalah benar dan
                                    dapat dipertanggungjawabkan.

                                </label>


                                @error('persetujuan')
                                    <div class="invalid-feedback">

                                        {{ $message }}

                                    </div>
                                @enderror

                            </div>


                            <!-- =========================
                             BUTTON
                        ========================== -->

                            <div class="button-area">

                                <a href="{{ route('ppdb.step2') }}" class="btn btn-secondary">
                                    Kembali
                                </a>


                                <button type="submit" class="btn btn-warning">
                                    Simpan Pendaftaran
                                </button>

                            </div>


                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        /*
    |--------------------------------------------------------------------------
    | PREVIEW FILE
    |--------------------------------------------------------------------------
    |
    | Fungsi ini akan:
    |
    | 1. Mengecek file yang dipilih
    | 2. Mengecek ukuran maksimal 2 MB
    | 3. Menampilkan preview gambar JPG/JPEG/PNG
    | 4. Menampilkan informasi PDF
    | 5. Menampilkan nama file
    |
    */

        function setupFilePreview(inputId, previewId) {

            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);


            if (!input || !preview) {
                return;
            }


            input.addEventListener('change', function() {

                /*
                |--------------------------------------------------------------------------
                | RESET PREVIEW
                |--------------------------------------------------------------------------
                */

                preview.innerHTML = '';
                preview.classList.remove('show');


                /*
                |--------------------------------------------------------------------------
                | CEK FILE
                |--------------------------------------------------------------------------
                */

                const file = this.files[0];

                if (!file) {
                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | BATAS UKURAN 2 MB
                |--------------------------------------------------------------------------
                */

                const maxSize = 2 * 1024 * 1024;


                if (file.size > maxSize) {

                    preview.innerHTML = `
                <div class="alert alert-danger mb-0">
                    <strong>File terlalu besar!</strong>
                    <br>
                    File <strong>${escapeHtml(file.name)}</strong>
                    berukuran
                    ${(file.size / 1024 / 1024).toFixed(2)} MB.
                    <br>
                    Maksimal ukuran file adalah 2 MB.
                </div>
            `;

                    preview.classList.add('show');

                    /*
                    |--------------------------------------------------------------------------
                    | RESET INPUT
                    |--------------------------------------------------------------------------
                    */

                    this.value = '';

                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | INFORMASI FILE
                |--------------------------------------------------------------------------
                */

                const fileName = escapeHtml(file.name);

                const fileSize =
                    (file.size / 1024 / 1024).toFixed(2);


                /*
                |--------------------------------------------------------------------------
                | JIKA FILE GAMBAR
                |--------------------------------------------------------------------------
                */

                if (file.type.startsWith('image/')) {

                    const reader = new FileReader();


                    reader.onload = function(event) {

                        preview.innerHTML = `

                    <div class="image-preview-title">
                        ✓ Gambar berhasil dipilih
                    </div>

                    <img
                        src="${event.target.result}"
                        alt="Preview ${fileName}"
                    >

                    <div class="file-name">
                        File: ${fileName}
                    </div>

                    <div class="file-type">
                        Ukuran: ${fileSize} MB
                    </div>

                `;

                        preview.classList.add('show');

                    };


                    reader.readAsDataURL(file);

                }


                /*
                |--------------------------------------------------------------------------
                | JIKA FILE PDF
                |--------------------------------------------------------------------------
                */
                else if (file.type === 'application/pdf') {

                    preview.innerHTML = `

                <div class="pdf-preview">

                    <div class="pdf-icon">
                        PDF
                    </div>

                    <div>

                        <strong>
                            Dokumen PDF berhasil dipilih
                        </strong>

                        <br>

                        <small class="text-muted">
                            ${fileName}
                        </small>

                    </div>

                </div>


                <div class="file-name">
                    File: ${fileName}
                </div>

                <div class="file-type">
                    Ukuran: ${fileSize} MB
                </div>

            `;

                    preview.classList.add('show');

                }


                /*
                |--------------------------------------------------------------------------
                | FORMAT TIDAK DIKENAL
                |--------------------------------------------------------------------------
                */
                else {

                    preview.innerHTML = `

                <div class="alert alert-danger mb-0">

                    Format file
                    <strong>${fileName}</strong>
                    tidak didukung.

                    <br>

                    Gunakan JPG, JPEG, PNG, atau PDF.

                </div>

            `;

                    preview.classList.add('show');

                    this.value = '';

                }

            });

        }


        /*
        |--------------------------------------------------------------------------
        | MENCEGAH HTML INJECTION PADA NAMA FILE
        |--------------------------------------------------------------------------
        */

        function escapeHtml(text) {

            const div = document.createElement('div');

            div.textContent = text;

            return div.innerHTML;

        }


        /*
        |--------------------------------------------------------------------------
        | AKTIFKAN PREVIEW
        |--------------------------------------------------------------------------
        */

        setupFilePreview(
            'akta_kelahiran',
            'preview_akta_kelahiran'
        );


        setupFilePreview(
            'kartu_keluarga',
            'preview_kartu_keluarga'
        );


        setupFilePreview(
            'ktp_orang_tua',
            'preview_ktp_orang_tua'
        );


        setupFilePreview(
            'ijazah_paud',
            'preview_ijazah_paud'
        );


        setupFilePreview(
            'pas_foto',
            'preview_pas_foto'
        );
    </script>


</body>

</html>
