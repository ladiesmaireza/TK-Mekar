<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Orang Tua | TK Mekar Tigo Jangko</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
            font-size: 14px;
        }

        .login-container {
            max-width: 500px;
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

        .form-label {
            font-size: 14px;
            margin-bottom: 6px;
        }

        .form-control {
            font-size: 14px;
            min-height: 38px;
        }

        .form-control::placeholder {
            font-size: 14px;
            color: #6c757d;
        }

        .btn {
            font-size: 14px;
        }

        .alert {
            font-size: 14px;
        }

        .login-link {
            font-size: 14px;
        }
    </style>

</head>

<body>

    <div class="container mt-5 mb-5">

        <div class="row justify-content-center">

            <div class="col-md-6 login-container">

                {{-- JUDUL --}}
                <div class="text-center mb-4">

                    <h4 class="fw-bold mb-1">
                        PPDB TK Mekar Tigo Jangko
                    </h4>

                    <p class="text-muted mb-0">
                        Pendaftaran Peserta Didik Baru
                    </p>

                </div>


                {{-- CARD --}}
                <div class="card shadow-sm border-0">

                    {{-- HEADER --}}
                    <div class="card-header bg-primary text-white">

                        <h4 class="mb-1">
                            Login Orang Tua
                        </h4>

                        <small>
                            Masuk menggunakan akun PPDB Anda
                        </small>

                    </div>


                    {{-- BODY --}}
                    <div class="card-body p-4">

                        {{-- ERROR --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show">

                                {{ session('error') }}

                                <button type="button" class="btn-close" data-bs-dismiss="alert">
                                </button>

                            </div>
                        @endif


                        {{-- SUCCESS --}}
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
                                Informasi
                            </strong>

                            <br>

                            Silakan login menggunakan email dan password
                            yang telah digunakan saat registrasi akun PPDB.

                        </div>


                        {{-- FORM LOGIN --}}
                        <form action="{{ route('orangtua.authenticate') }}" method="POST">

                            @csrf


                            {{-- EMAIL --}}
                            <div class="mb-3">

                                <label for="email" class="form-label fw-bold">

                                    Email

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email') }}" placeholder="Masukkan email" required autofocus>

                            </div>


                            {{-- PASSWORD --}}
                            <div class="mb-4">

                                <label for="password" class="form-label fw-bold">

                                    Password

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>

                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Masukkan password" required>

                            </div>


                            {{-- BUTTON --}}
                            <button type="submit" class="btn btn-primary w-100">

                                Login

                            </button>

                        </form>


                        <hr>


                        {{-- REGISTER --}}
                        <div class="text-center login-link">

                            <span class="text-muted">
                                Belum memiliki akun?
                            </span>

                            <a href="{{ route('ppdb.akun') }}" class="text-decoration-none">

                                Daftar Akun PPDB

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
