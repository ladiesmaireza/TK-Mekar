<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PPDB Data Anak - TK Mekar Tigo Jangko</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
        }

        .card {
            border-radius: 8px;
        }

        .card-header {
            border-radius: 8px 8px 0 0 !important;
        }

        .step-indicator {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 25px;
        }

        .step {
            display: flex;
            align-items: center;
        }

        .step-number {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            background-color: #dee2e6;
            color: #495057;
        }

        .step-done {
            background-color: #198754;
            color: white;
        }

        .step-active {
            background-color: #198754;
            color: white;
        }

        .step-line {
            width: 60px;
            height: 2px;
            background-color: #198754;
            margin: 0 8px;
        }

        @media (max-width: 576px) {
            .step-line {
                width: 25px;
            }
        }
    </style>

</head>

<body>

    <div class="container mt-5 mb-5">

        <div class="row justify-content-center">

            <div class="col-md-8">

                {{-- JUDUL --}}
                <div class="text-center mb-4">

                    <h4 class="fw-bold">
                        PPDB TK Mekar Tigo Jangko
                    </h4>

                    <p class="text-muted mb-0">
                        Pendaftaran Peserta Didik Baru
                    </p>

                </div>


                {{-- INDIKATOR STEP --}}
                <div class="step-indicator">

                    {{-- STEP 1 --}}
                    <div class="step">

                        <div class="step-number step-done">
                            ✓
                        </div>

                    </div>

                    <div class="step-line"></div>


                    {{-- STEP 2 --}}
                    <div class="step">

                        <div class="step-number step-active">
                            2
                        </div>

                    </div>

                    <div class="step-line"></div>


                    {{-- STEP 3 --}}
                    <div class="step">

                        <div class="step-number">
                            3
                        </div>

                    </div>

                </div>


                {{-- CARD --}}
                <div class="card shadow-sm border-0">

                    {{-- HEADER --}}
                    <div class="card-header bg-success text-white">

                        <h4 class="mb-1">
                            Step 2 - Data Anak
                        </h4>

                        <small>
                            Lengkapi data calon peserta didik
                        </small>

                    </div>


                    {{-- BODY --}}
                    <div class="card-body p-4">

                        {{-- ERROR SESSION --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show">

                                {{ session('error') }}

                                <button type="button" class="btn-close" data-bs-dismiss="alert">
                                </button>

                            </div>
                        @endif


                        {{-- SUCCESS SESSION --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">

                                {{ session('success') }}

                                <button type="button" class="btn-close" data-bs-dismiss="alert">
                                </button>

                            </div>
                        @endif


                        {{-- VALIDATION ERROR --}}
                        @if ($errors->any())

                            <div class="alert alert-danger">

                                <strong>
                                    Periksa kembali data berikut:
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


                        {{-- INFORMASI --}}
                        <div class="alert alert-info">

                            <strong>Informasi</strong>

                            <br>

                            Silakan isi data anak dan data orang tua sesuai
                            dengan dokumen resmi yang dimiliki.

                        </div>


                        {{-- FORM --}}
                        <form action="{{ route('ppdb.storeStep2') }}" method="POST">

                            @csrf


                            {{-- ================================================== --}}
                            {{-- DATA ANAK --}}
                            {{-- ================================================== --}}

                            <h6 class="fw-bold mb-3">
                                Data Calon Peserta Didik
                            </h6>


                            {{-- NAMA ANAK --}}
                            <div class="mb-3">

                                <label for="nama_lengkap" class="form-label fw-bold">

                                    Nama Lengkap Anak

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control"
                                    value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap anak" required>

                            </div>


                            {{-- TEMPAT LAHIR --}}
                            <div class="mb-3">

                                <label for="tempat_lahir" class="form-label fw-bold">

                                    Tempat Lahir

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control"
                                    value="{{ old('tempat_lahir') }}" placeholder="Masukkan tempat lahir" required>

                            </div>


                            {{-- TANGGAL LAHIR --}}
                            <div class="mb-3">

                                <label for="tanggal_lahir" class="form-label fw-bold">

                                    Tanggal Lahir

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control"
                                    value="{{ old('tanggal_lahir') }}" required>

                            </div>


                            {{-- JENIS KELAMIN --}}
                            <div class="mb-4">

                                <label for="jenis_kelamin" class="form-label fw-bold">

                                    Jenis Kelamin

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>

                                    <option value="">
                                        -- Pilih Jenis Kelamin --
                                    </option>

                                    <option value="Laki-laki"
                                        {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>

                                        Laki-laki

                                    </option>

                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>

                                        Perempuan

                                    </option>

                                </select>

                            </div>


                            <hr class="my-4">


                            {{-- ================================================== --}}
                            {{-- DATA ORANG TUA --}}
                            {{-- ================================================== --}}

                            <h6 class="fw-bold mb-3">
                                Data Orang Tua
                            </h6>


                            {{-- NAMA AYAH --}}
                            <div class="mb-3">

                                <label for="nama_ayah" class="form-label fw-bold">

                                    Nama Ayah

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <input type="text" id="nama_ayah" name="nama_ayah" class="form-control"
                                    value="{{ old('nama_ayah') }}" placeholder="Masukkan nama ayah" required>

                            </div>


                            {{-- NAMA IBU --}}
                            <div class="mb-3">

                                <label for="nama_ibu" class="form-label fw-bold">

                                    Nama Ibu

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <input type="text" id="nama_ibu" name="nama_ibu" class="form-control"
                                    value="{{ old('nama_ibu') }}" placeholder="Masukkan nama ibu" required>

                            </div>


                            {{-- NOMOR HP --}}
                            <div class="mb-3">

                                <label for="nomor_hp" class="form-label fw-bold">

                                    Nomor HP / WhatsApp

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <input type="text" id="nomor_hp" name="nomor_hp" class="form-control"
                                    value="{{ old('nomor_hp') }}" placeholder="Contoh: 081234567890" maxlength="20"
                                    required>

                                <small class="text-muted">
                                    Gunakan nomor HP/WhatsApp yang aktif.
                                </small>

                            </div>


                            {{-- ALAMAT --}}
                            <div class="mb-4">

                                <label for="alamat" class="form-label fw-bold">

                                    Alamat

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <textarea id="alamat" name="alamat" class="form-control" rows="4" placeholder="Masukkan alamat lengkap"
                                    required>{{ old('alamat') }}</textarea>

                            </div>


                            {{-- BUTTON --}}
                            <div class="d-flex justify-content-between">

                                <a href="{{ route('ppdb.akun') }}" class="btn btn-secondary">

                                    Kembali

                                </a>


                                <button type="submit" class="btn btn-success">

                                    Lanjut Upload Dokumen

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
