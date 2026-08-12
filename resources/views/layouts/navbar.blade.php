{{-- =========================================================
     TOP BAR
========================================================= --}}
<div class="topbar py-2" style="background:#22c3b3;">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

            {{-- KONTAK --}}
            <div class="d-flex align-items-center flex-wrap gap-3 text-white">

                {{-- TELEPON --}}
                <a href="tel:+6282371496967"
                   class="text-white text-decoration-none contact-link">

                    <i class="fas fa-phone-alt me-2"></i>
                    +62 823 7149 6967

                </a>

                <span class="text-white">|</span>

                {{-- EMAIL --}}
                <a href="mailto:tigojangkotkmekar@gmail.com"
                   class="text-white text-decoration-none contact-link">

                    <i class="fas fa-envelope me-2"></i>
                    tigojangkotkmekar@gmail.com

                </a>

            </div>


            {{-- SOCIAL MEDIA --}}
            <div class="d-flex align-items-center">

                {{-- FACEBOOK --}}
                <a href="https://www.facebook.com/profile.php?id=100069831382917&locale=id_ID"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="text-white me-3 social-link"
                   aria-label="Facebook TK Mekar Tigo Jangko"
                   title="Facebook TK Mekar Tigo Jangko">

                    <i class="fab fa-facebook-f"></i>

                </a>


                {{-- INSTAGRAM --}}
                <a href="https://www.instagram.com/mekartigojangko/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="text-white social-link"
                   aria-label="Instagram TK Mekar Tigo Jangko"
                   title="Instagram TK Mekar Tigo Jangko">

                    <i class="fab fa-instagram"></i>

                </a>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     HEADER LOGO
========================================================= --}}
<header class="header-logo bg-white shadow-sm">

    <div class="container py-4">

        <div class="d-flex align-items-center">

            {{-- LOGO --}}
            <img src="{{ asset('assets/img/logo-tk.jpg') }}"
                 alt="Logo TK Mekar Tigo Jangko"
                 class="logo me-4"
                 width="110"
                 height="110"
                 style="object-fit:contain;">


            {{-- NAMA SEKOLAH --}}
            <div>

                <h1 class="fw-bold text-success mb-2"
                    style="font-size:52px;">

                    TK MEKAR TIGO JANGKO

                </h1>


                <h4 class="text-secondary fw-normal mb-0">

                    Mewujudkan Anak yang Cerdas,
                    Kreatif, Mandiri dan Berakhlak Mulia

                </h4>

            </div>

        </div>

    </div>

</header>


{{-- =========================================================
     NAVBAR
========================================================= --}}
<nav class="navbar navbar-expand-lg navbar-dark">

    <div class="container-fluid px-5">

        {{-- MOBILE BUTTON --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- MENU --}}
        <div class="collapse navbar-collapse justify-content-center"
             id="navbarResponsive">

            <ul class="navbar-nav">


                {{-- =================================================
                     BERANDA
                ================================================== --}}
                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">

                        Beranda

                    </a>

                </li>


                {{-- =================================================
                     PROFIL
                ================================================== --}}
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle
                        {{ request()->routeIs('profil.*') ? 'active' : '' }}"
                       href="#"
                       id="profilDropdown"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        Profil

                    </a>


                    <ul class="dropdown-menu"
                        aria-labelledby="profilDropdown">


                        {{-- SAMBUTAN --}}
                        <li>

                            <a class="dropdown-item"
                               href="{{ route('profil.sambutan') }}">

                                Sambutan Kepala Sekolah

                            </a>

                        </li>


                        {{-- SEJARAH --}}
                        <li>

                            <a class="dropdown-item"
                               href="{{ route('profil.sejarah') }}">

                                Sejarah Sekolah

                            </a>

                        </li>


                        {{-- VISI MISI --}}
                        <li>

                            <a class="dropdown-item"
                               href="{{ route('profil.visi-misi') }}">

                                Visi & Misi

                            </a>

                        </li>


                        {{-- STRUKTUR ORGANISASI --}}
                        <li>

                            <a class="dropdown-item"
                               href="{{ route('profil.struktur-organisasi') }}">

                                Struktur Organisasi

                            </a>

                        </li>

                    </ul>

                </li>


                {{-- =================================================
                     GURU
                ================================================== --}}
                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('guru') ? 'active' : '' }}"
                       href="{{ route('guru') }}">

                        Guru

                    </a>

                </li>


                {{-- =================================================
                     FASILITAS
                ================================================== --}}
                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('fasilitas') ? 'active' : '' }}"
                       href="{{ route('fasilitas') }}">

                        Fasilitas

                    </a>

                </li>


                {{-- =================================================
                     GALERI
                ================================================== --}}
                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('galeri.*') ? 'active' : '' }}"
                       href="{{ route('galeri.foto') }}">

                        Galeri

                    </a>

                </li>


                {{-- =================================================
                     BERITA
                ================================================== --}}
                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}"
                       href="{{ route('berita') }}">

                        Berita

                    </a>

                </li>


                {{-- =================================================
                     KONTAK
                ================================================== --}}
                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}"
                       href="{{ route('kontak') }}">

                        Kontak

                    </a>

                </li>


            </ul>

        </div>

    </div>

</nav>


{{-- =========================================================
     STYLE HEADER
========================================================= --}}
<style>

    /* TOPBAR */

    .topbar {
        font-size: 14px;
    }


    .contact-link {
        transition: all 0.2s ease;
    }


    .contact-link:hover {
        opacity: 0.8;
        text-decoration: underline !important;
    }


    /* SOCIAL MEDIA */

    .social-link {
        width: 34px;
        height: 34px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: rgba(255,255,255,0.15);

        transition: all 0.25s ease;
    }


    .social-link:hover {
        background: rgba(255,255,255,0.30);
        transform: translateY(-2px);
    }


    /* HEADER */

    .header-logo {
        border-bottom: 1px solid #eeeeee;
    }


    .header-logo .logo {
        border-radius: 10px;
    }


    /* NAVBAR */

    .navbar {
        background: #22c3b3;
    }


    .navbar .nav-link {
        color: white !important;

        font-weight: 500;

        padding: 12px 18px !important;

        transition: all 0.2s ease;
    }


    .navbar .nav-link:hover {
        color: #ffffff !important;
        background: rgba(255,255,255,0.12);
        border-radius: 6px;
    }


    .navbar .nav-link.active {
        background: rgba(255,255,255,0.18);
        border-radius: 6px;
        font-weight: 600;
    }


    /* DROPDOWN */

    .navbar .dropdown-menu {
        border: none;
        border-radius: 10px;

        margin-top: 8px;

        padding: 8px;

        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }


    .navbar .dropdown-item {
        padding: 10px 14px;
        border-radius: 6px;

        font-size: 14px;
    }


    .navbar .dropdown-item:hover {
        background: #22c3b3;
        color: white;
    }


    /* RESPONSIVE */

    @media (max-width: 768px) {

        .header-logo .container {
            padding-top: 20px !important;
            padding-bottom: 20px !important;
        }


        .header-logo .d-flex {
            flex-direction: column;
            text-align: center;
        }


        .header-logo .logo {
            margin-right: 0 !important;
            margin-bottom: 15px;
        }


        .header-logo h1 {
            font-size: 32px !important;
        }


        .header-logo h4 {
            font-size: 16px;
            line-height: 1.6;
        }


        .topbar .container > div {
            justify-content: center;
        }


        .navbar .nav-link {
            padding: 10px 15px !important;
        }

    }

</style>
