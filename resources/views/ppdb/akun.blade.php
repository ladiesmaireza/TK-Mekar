<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PPDB - TK Mekar Tigo Jangko</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
            font-size: 14px;
        }

        .card {
            border-radius: 8px;
        }

        .card-header {
            border-radius: 8px 8px 0 0 !important;
        }

        .card-header h4 {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .card-header small {
            font-size: 0.875rem;
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

            font-size: 14px;
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

        .info-box {
            line-height: 1.7;
        }

        .btn {
            font-size: 14px;
        }

        .text-center h4 {
            font-size: 1.25rem;
        }

        .text-center p {
            font-size: 14px;
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

                    <h4 class="fw-bold mb-1">
                        PPDB TK Mekar Tigo Jangko
                    </h4>

                    <p class="text-muted mb-0">
                        Pendaftaran Peserta Didik Baru
                    </p>

                </div>


                {{-- INDIKATOR PROSES --}}
                <div class="step-indicator">

                    {{-- REGISTER --}}
                    <div class="step">

                        <div class="step-number step-active">
                            1
                        </div>

                    </div>

                    <div class="step-line"></div>


                    {{-- DATA ANAK --}}
                    <div class="step">

                        <div class="step-number step-inactive">
                            2
                        </div>

                    </div>

                    <div class="step-line"></div>


                    {{-- DOKUMEN --}}
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
                            Pendaftaran PPDB
                        </h4>

                        <small>
                            Buat akun orang tua untuk memulai pendaftaran
                        </small>

                    </div>


                    {{-- BODY --}}
                    <div class="card-body p-4">

                        {{-- SUCCESS --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">

                                {{ session('success') }}

                                <button type="button" class="btn-close" data-bs-dismiss="alert">
                                </button>

                            </div>
                        @endif


                        {{-- ERROR --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show">

                                {{ session('error') }}

                                <button type="button" class="btn-close" data-bs-dismiss="alert">
                                </button>

                            </div>
                        @endif


                        {{-- INFORMASI --}}
                        <div class="alert alert-info info-box">

                            <strong>Informasi Pendaftaran</strong>

                            <br><br>

                            Untuk melakukan pendaftaran peserta didik baru,
                            orang tua/wali harus memiliki akun terlebih dahulu.

                            <br><br>

                            Setelah akun berhasil dibuat, Anda akan diarahkan
                            ke halaman <strong>Login Orang Tua</strong>.

                            <br><br>

                            Setelah berhasil login, Anda dapat melanjutkan
                            pengisian data calon peserta didik pada
                            <strong>Step 2</strong>.

                        </div>


                        {{-- ALUR --}}
                        <div class="mb-4">

                            <h6 class="fw-bold mb-3">
                                Alur Pendaftaran
                            </h6>

                            <div class="d-flex align-items-start mb-3">

                                <div class="me-3">

                                    <span class="badge bg-primary rounded-circle p-2">
                                        1
                                    </span>

                                </div>

                                <div>
                                    <strong>Buat Akun Orang Tua</strong>

                                    <br>

                                    <small class="text-muted">
                                        Daftarkan nama, email, dan password.
                                    </small>
                                </div>

                            </div>


                            <div class="d-flex align-items-start mb-3">

                                <div class="me-3">

                                    <span class="badge bg-secondary rounded-circle p-2">
                                        2
                                    </span>

                                </div>

                                <div>
                                    <strong>Login Orang Tua</strong>

                                    <br>

                                    <small class="text-muted">
                                        Login menggunakan email dan password
                                        yang telah didaftarkan.
                                    </small>
                                </div>

                            </div>


                            <div class="d-flex align-items-start mb-3">

                                <div class="me-3">

                                    <span class="badge bg-secondary rounded-circle p-2">
                                        3
                                    </span>

                                </div>

                                <div>
                                    <strong>Data Calon Peserta Didik</strong>

                                    <br>

                                    <small class="text-muted">
                                        Lengkapi data anak pada Step 2.
                                    </small>
                                </div>

                            </div>


                            <div class="d-flex align-items-start">

                                <div class="me-3">

                                    <span class="badge bg-secondary rounded-circle p-2">
                                        4
                                    </span>

                                </div>

                                <div>
                                    <strong>Upload Dokumen</strong>

                                    <br>

                                    <small class="text-muted">
                                        Upload dokumen persyaratan pada Step 3.
                                    </small>

                                </div>

                            </div>

                        </div>


                        {{-- TOMBOL REGISTER --}}
                        <div class="d-grid">

                            <a href="{{ route('orangtua.register') }}" class="btn btn-primary">

                                Buat Akun Orang Tua

                            </a>

                        </div>


                        {{-- LOGIN --}}
                        <div class="text-center mt-4">

                            <span class="text-muted">
                                Sudah memiliki akun orang tua?
                            </span>

                            <a href="{{ route('orangtua.login') }}" class="text-decoration-none fw-semibold">

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
