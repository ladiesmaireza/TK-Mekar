<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'TK Mekar Tigo Jangko')
    </title>

    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #ffffff;
            color: #333;
        }

        /* NAVBAR */

        .navbar {
            background: #ffffff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            padding: 12px 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: #198754 !important;
        }

        .navbar-brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
            margin-right: 10px;
        }

        .nav-link {
            font-weight: 500;
            color: #333 !important;
            margin: 0 5px;
        }

        .nav-link:hover {
            color: #198754 !important;
        }

        .btn-ppdb {
            background: #198754;
            color: white !important;
            padding: 9px 18px !important;
            border-radius: 8px;
        }

        .btn-ppdb:hover {
            background: #146c43;
        }

        /* CONTENT */

        main {
            min-height: 70vh;
        }

        /* FOOTER */

        footer {
            background: #1f2937;
            color: white;
            padding: 50px 0 20px;
            margin-top: 50px;
        }

        footer h5 {
            font-weight: 600;
            margin-bottom: 20px;
        }

        footer p {
            color: #d1d5db;
            font-size: 14px;
        }

        footer a {
            color: #d1d5db;
            text-decoration: none;
        }

        footer a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 30px;
            padding-top: 20px;
            text-align: center;
            font-size: 13px;
            color: #9ca3af;
        }
    </style>

    @stack('styles')

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top">

        <div class="container">

            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">

                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo TK Mekar Tigo Jangko">

                <span>
                    TK Mekar Tigo Jangko
                </span>

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUser">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarUser">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            Beranda
                        </a>
                    </li>

                    <!-- PROFIL -->

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">

                            Profil
                        </a>

                        <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item" href="{{ url('/profil/sambutan') }}">
                                    Sambutan
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ url('/profil/sejarah') }}">
                                    Sejarah
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ url('/profil/visi-misi') }}">
                                    Visi & Misi
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ url('/profil/struktur-organisasi') }}">
                                    Struktur Organisasi
                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/guru') }}">
                            Guru
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/fasilitas') }}">
                            Fasilitas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/galeri/foto') }}">
                            Galeri
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/berita') }}">
                            Berita
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/kontak') }}">
                            Kontak
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">

                        <a class="nav-link btn-ppdb" href="{{ url('/ppdb/form') }}">

                            <i class="bi bi-pencil-square"></i>

                            PPDB

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>


    <!-- CONTENT -->

    <main>

        @yield('content')

    </main>


    <!-- FOOTER -->

    <footer>

        <div class="container">

            <div class="row">

                <div class="col-md-5 mb-4">

                    <h5>
                        TK Mekar Tigo Jangko
                    </h5>

                    <p>
                        Website resmi TK Mekar Tigo Jangko sebagai
                        media informasi sekolah dan pelayanan
                        Penerimaan Peserta Didik Baru (PPDB).
                    </p>

                </div>


                <div class="col-md-3 mb-4">

                    <h5>
                        Navigasi
                    </h5>

                    <p>
                        <a href="{{ url('/') }}">
                            Beranda
                        </a>
                    </p>

                    <p>
                        <a href="{{ url('/guru') }}">
                            Guru
                        </a>
                    </p>

                    <p>
                        <a href="{{ url('/fasilitas') }}">
                            Fasilitas
                        </a>
                    </p>

                    <p>
                        <a href="{{ url('/berita') }}">
                            Berita
                        </a>
                    </p>

                </div>


                <div class="col-md-4 mb-4">

                    <h5>
                        Informasi
                    </h5>

                    <p>
                        <i class="bi bi-geo-alt"></i>
                        Tigo Jangko
                    </p>

                    <p>
                        <i class="bi bi-telephone"></i>
                        Informasi Kontak Sekolah
                    </p>

                    <p>
                        <i class="bi bi-envelope"></i>
                        Email Sekolah
                    </p>

                </div>

            </div>


            <div class="footer-bottom">

                © {{ date('Y') }}
                TK Mekar Tigo Jangko.
                Semua Hak Dilindungi.

            </div>

        </div>

    </footer>


    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>

</html>
