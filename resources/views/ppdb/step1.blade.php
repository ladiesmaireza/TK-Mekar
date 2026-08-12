<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrasi Akun PPDB - TK Mekar Tigo Jangko</title>

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
        }

        .step-active {
            background-color: #0d6efd;
            color: white;
        }

        .step-inactive {
            background-color: #dee2e6;
            color: #6c757d;
        }

        .step-line {
            width: 60px;
            height: 2px;
            background-color: #dee2e6;
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

                        <div class="step-number step-active">
                            1
                        </div>

                    </div>


                    <div class="step-line"></div>


                    {{-- STEP 2 --}}
                    <div class="step">

                        <div class="step-number step-inactive">
                            2
                        </div>

                    </div>


                    <div class="step-line"></div>


                    {{-- STEP 3 --}}
                    <div class="step">

                        <div class="step-number step-inactive">
                            3
                        </div>

                    </div>

                </div>


                {{-- CARD --}}
                <div class="card shadow-sm border-0">

                    {{-- HEADER --}}
                    <div class="card-header bg-primary text-white">

                        <h4 class="mb-1">
                            Registrasi Akun PPDB
                        </h4>

                        <small>
                            Buat akun orang tua untuk memulai pendaftaran
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

                            <strong>
                                Informasi Pendaftaran
                            </strong>

                            <br>

                            Silakan buat akun orang tua terlebih dahulu.
                            Akun ini akan digunakan untuk melanjutkan proses pendaftaran PPDB.

                        </div>


                        <form action="{{ route('ppdb.storeStep1') }}" method="POST">

                            @csrf


                            {{-- NAMA --}}
                            <div class="mb-3">

                                <label for="nama" class="form-label fw-bold">

                                    Nama

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <input type="text" id="nama" name="nama" class="form-control"
                                    value="{{ old('nama') }}" placeholder="Masukkan nama" required autofocus>

                            </div>


                            {{-- EMAIL --}}
                            <div class="mb-3">

                                <label for="email" class="form-label fw-bold">

                                    Email / Username

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email') }}" placeholder="Masukkan email" required>

                            </div>


                            {{-- PASSWORD --}}
                            <div class="mb-3">

                                <label for="password" class="form-label fw-bold">

                                    Password

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Masukkan password" required>

                                <small class="text-muted">
                                    Password minimal 6 karakter.
                                </small>

                            </div>


                            {{-- KONFIRMASI PASSWORD --}}
                            <div class="mb-4">

                                <label for="password_confirmation" class="form-label fw-bold">

                                    Konfirmasi Password

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" placeholder="Masukkan kembali password" required>

                            </div>


                            {{-- TOMBOL --}}
                            <div class="d-flex justify-content-end">

                                <button type="submit" class="btn btn-primary">

                                    Daftar Akun

                                </button>

                            </div>

                        </form>


                        {{-- LOGIN --}}
                        <div class="text-center mt-4">

                            <span class="text-muted">
                                Sudah memiliki akun?
                            </span>

                            <a href="{{ route('login') }}" class="text-decoration-none">

                                Login di sini

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
