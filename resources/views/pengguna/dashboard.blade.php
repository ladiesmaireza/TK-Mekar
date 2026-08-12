<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Pengguna - TK Mekar Tigo Jangko</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #333;
        }

        /* NAVBAR */
        .navbar {
            background: #176df5;
            color: white;
            padding: 15px 35px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            flex-wrap: wrap;
            gap: 15px;

            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
        }

        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .navbar-menu a {
            color: white;
            text-decoration: none;
            padding: 9px 13px;
            border-radius: 6px;
            font-size: 14px;
        }

        .navbar-menu a:hover {
            background: rgba(255, 255, 255, 0.18);
        }

        .logout-form {
            display: inline;
            margin: 0;
        }

        .logout-btn {
            border: none;
            background: #dc3545;
            color: white;
            padding: 9px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .logout-btn:hover {
            background: #bb2d3b;
        }

        /* CONTAINER */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 35px auto;
        }

        /* WELCOME */
        .welcome {
            background: white;
            border-radius: 12px;
            padding: 30px;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);

            margin-bottom: 30px;
        }

        .welcome h1 {
            margin: 0 0 10px;
            color: #176df5;
            font-size: 30px;
        }

        .welcome p {
            margin: 7px 0;
            color: #666;
            line-height: 1.7;
        }

        .welcome strong {
            color: #222;
        }

        /* SECTION */
        .section-title {
            margin: 0 0 18px;
            font-size: 24px;
            color: #222;
        }

        /* MENU GRID */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .menu-card {
            background: white;
            padding: 28px 20px;

            border-radius: 12px;

            text-align: center;

            text-decoration: none;
            color: #333;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);

            transition: 0.2s;
        }

        .menu-card:hover {
            transform: translateY(-5px);

            box-shadow:
                0 8px 22px rgba(0, 0, 0, 0.12);
        }

        .menu-icon {
            width: 65px;
            height: 65px;

            margin: 0 auto 15px;

            border-radius: 50%;

            background: #eaf2ff;
            color: #176df5;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 30px;
        }

        .menu-card h3 {
            margin: 0 0 8px;
            font-size: 18px;
        }

        .menu-card p {
            margin: 0;

            font-size: 13px;

            color: #777;

            line-height: 1.6;
        }

        /* PPDB CARD */
        .ppdb-card {
            border: 2px solid #176df5;
        }

        .ppdb-card .menu-icon {
            background: #176df5;
            color: white;
        }

        /* FOOTER */
        .footer {
            margin-top: 50px;

            padding: 20px;

            text-align: center;

            color: #777;

            font-size: 14px;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {

            .menu-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 600px) {

            .navbar {
                padding: 15px 20px;
            }

            .brand {
                width: 100%;
                text-align: center;
            }

            .navbar-menu {
                width: 100%;
                justify-content: center;
            }

            .navbar-menu a {
                font-size: 13px;
            }

            .container {
                width: 94%;
            }

            .welcome {
                padding: 22px;
            }

            .welcome h1 {
                font-size: 25px;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

        }
    </style>

</head>

<body>

    {{-- ================= NAVBAR ================= --}}
    <nav class="navbar">

        <div class="brand">
            TK Mekar Tigo Jangko
        </div>

        <div class="navbar-menu">

            <a href="{{ route('home') }}">
                Beranda
            </a>

            <a href="{{ route('profil') }}">
                Profil
            </a>

            <a href="{{ route('guru') }}">
                Guru
            </a>

            <a href="{{ route('fasilitas') }}">
                Fasilitas
            </a>

            <a href="{{ route('galeri.foto') }}">
                Galeri
            </a>

            <a href="{{ route('berita') }}">
                Berita
            </a>

            <a href="{{ route('kontak') }}">
                Kontak
            </a>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>

        </div>

    </nav>


    {{-- ================= CONTENT ================= --}}
    <main class="container">

        {{-- WELCOME --}}
        <div class="welcome">

            <h1>
                Dashboard Pengguna
            </h1>

            <p>
                Selamat datang,
                <strong>{{ $user->name }}</strong>.
            </p>

            <p>
                Anda berhasil login sebagai pengguna.
                Silakan gunakan menu di bawah untuk
                mengakses informasi dan layanan
                TK Mekar Tigo Jangko.
            </p>

        </div>


        {{-- MENU --}}
        <h2 class="section-title">
            Menu Pengguna
        </h2>


        <div class="menu-grid">

            {{-- PROFIL --}}
            <a href="{{ route('profil') }}" class="menu-card">

                <div class="menu-icon">
                    🏫
                </div>

                <h3>
                    Profil Sekolah
                </h3>

                <p>
                    Lihat informasi profil, sejarah,
                    visi dan misi sekolah.
                </p>

            </a>


            {{-- GURU --}}
            <a href="{{ route('guru') }}" class="menu-card">

                <div class="menu-icon">
                    👩‍🏫
                </div>

                <h3>
                    Guru
                </h3>

                <p>
                    Lihat informasi tenaga pendidik
                    TK Mekar Tigo Jangko.
                </p>

            </a>


            {{-- FASILITAS --}}
            <a href="{{ route('fasilitas') }}" class="menu-card">

                <div class="menu-icon">
                    🏫
                </div>

                <h3>
                    Fasilitas
                </h3>

                <p>
                    Lihat berbagai fasilitas
                    yang tersedia di sekolah.
                </p>

            </a>


            {{-- GALERI --}}
            <a href="{{ route('galeri.foto') }}" class="menu-card">

                <div class="menu-icon">
                    🖼️
                </div>

                <h3>
                    Galeri
                </h3>

                <p>
                    Lihat dokumentasi kegiatan
                    dan foto sekolah.
                </p>

            </a>


            {{-- BERITA --}}
            <a href="{{ route('berita') }}" class="menu-card">

                <div class="menu-icon">
                    📰
                </div>

                <h3>
                    Berita
                </h3>

                <p>
                    Baca informasi dan berita
                    terbaru dari sekolah.
                </p>

            </a>


            {{-- KONTAK --}}
            <a href="{{ route('kontak') }}" class="menu-card">

                <div class="menu-icon">
                    📞
                </div>

                <h3>
                    Kontak
                </h3>

                <p>
                    Temukan informasi kontak
                    TK Mekar Tigo Jangko.
                </p>

            </a>


            {{-- PPDB --}}
            <a href="{{ route('ppdb.akun') }}" class="menu-card ppdb-card">

                <div class="menu-icon">
                    📝
                </div>

                <h3>
                    Pendaftaran PPDB
                </h3>

                <p>
                    Daftar sebagai calon peserta
                    didik baru melalui layanan PPDB.
                </p>

            </a>


            {{-- BERANDA --}}
            <a href="{{ route('home') }}" class="menu-card">

                <div class="menu-icon">
                    🏠
                </div>

                <h3>
                    Beranda Website
                </h3>

                <p>
                    Kembali ke halaman utama
                    website sekolah.
                </p>

            </a>

        </div>

    </main>


    {{-- ================= FOOTER ================= --}}
    <footer class="footer">

        &copy; {{ date('Y') }}

        TK Mekar Tigo Jangko.

        Semua hak dilindungi.

    </footer>

</body>

</html>
