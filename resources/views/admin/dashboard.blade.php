@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

    <style>
        .dashboard-wrapper {
            padding-bottom: 30px;
        }

        /* =========================
           HEADER DASHBOARD
        ========================== */
        .dashboard-hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 55%, #38bdf8 100%);
            border-radius: 20px;
            padding: 30px;
            color: #fff;
            margin-bottom: 25px;
            box-shadow: 0 12px 30px rgba(37, 99, 235, 0.18);
        }

        .dashboard-hero::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            right: -70px;
            top: -80px;
        }

        .dashboard-hero::after {
            content: "";
            position: absolute;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
            right: 160px;
            bottom: -80px;
        }

        .dashboard-hero-content {
            position: relative;
            z-index: 2;
        }

        .dashboard-label {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(255, 255, 255, 0.15);
            padding: 7px 13px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .dashboard-hero h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .dashboard-hero p {
            margin: 0;
            opacity: 0.88;
            font-size: 15px;
        }

        .hero-status {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.13);
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 14px;
            padding: 15px 18px;
            text-align: center;
            min-width: 150px;
        }

        .hero-status .status-dot {
            display: inline-block;
            width: 9px;
            height: 9px;
            background: #22c55e;
            border-radius: 50%;
            margin-right: 6px;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.15);
        }

        .hero-status strong {
            display: block;
            margin-top: 6px;
            font-size: 14px;
        }

        /* =========================
           STATISTIC CARDS
        ========================== */
        .stat-card {
            position: relative;
            overflow: hidden;
            border: 0;
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.06);
            transition: all 0.25s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.11);
        }

        .stat-card::after {
            content: "";
            position: absolute;
            width: 85px;
            height: 85px;
            border-radius: 50%;
            right: -30px;
            bottom: -35px;
            opacity: 0.08;
        }

        .stat-card.blue::after {
            background: #2563eb;
        }

        .stat-card.green::after {
            background: #10b981;
        }

        .stat-card.orange::after {
            background: #f59e0b;
        }

        .stat-card.purple::after {
            background: #8b5cf6;
        }

        .stat-body {
            padding: 22px;
            position: relative;
            z-index: 2;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-bottom: 17px;
        }

        .stat-icon.blue {
            background: #eff6ff;
            color: #2563eb;
        }

        .stat-icon.green {
            background: #ecfdf5;
            color: #059669;
        }

        .stat-icon.orange {
            background: #fff7ed;
            color: #ea580c;
        }

        .stat-icon.purple {
            background: #f5f3ff;
            color: #7c3aed;
        }

        .stat-title {
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .stat-number {
            color: #0f172a;
            font-size: 30px;
            line-height: 1;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .stat-description {
            color: #94a3b8;
            font-size: 12px;
            margin: 0;
        }

        /* =========================
           SECTION CARD
        ========================== */
        .dashboard-card {
            border: 0;
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.06);
        }

        .dashboard-card-header {
            padding: 22px 24px 10px;
        }

        .dashboard-card-header h5 {
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .dashboard-card-header p {
            font-size: 13px;
            color: #94a3b8;
            margin: 0;
        }

        .dashboard-card-body {
            padding: 15px 24px 24px;
        }

        /* =========================
           WELCOME CARD
        ========================== */
        .welcome-card {
            border: 0;
            border-radius: 18px;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.06);
            height: 100%;
        }

        .welcome-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 24px;
            margin-bottom: 17px;
        }

        .welcome-card h4 {
            color: #0f172a;
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .welcome-card p {
            color: #64748b;
            line-height: 1.8;
            font-size: 14px;
            margin-bottom: 0;
        }

        /* =========================
           QUICK INFO
        ========================== */
        .info-item {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .info-item:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .info-item:first-child {
            padding-top: 0;
        }

        .info-icon {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            color: #2563eb;
            flex-shrink: 0;
        }

        .info-item strong {
            display: block;
            font-size: 13px;
            color: #334155;
        }

        .info-item span {
            font-size: 12px;
            color: #94a3b8;
        }

        /* =========================
           RESPONSIVE
        ========================== */
        @media (max-width: 991px) {
            .dashboard-hero {
                padding: 25px;
            }

            .hero-status {
                margin-top: 20px;
            }
        }

        @media (max-width: 576px) {
            .dashboard-hero h2 {
                font-size: 23px;
            }

            .stat-number {
                font-size: 26px;
            }
        }
    </style>

    <div class="dashboard-wrapper">

        {{-- =========================
         HERO / HEADER
    ========================== --}}
        <div class="dashboard-hero">

            <div class="row align-items-center">

                <div class="col-lg-9">
                    <div class="dashboard-hero-content">

                        <div class="dashboard-label">
                            <i class="ti ti-layout-dashboard"></i>
                            Dashboard Administrator
                        </div>

                        <h2>
                            Selamat Datang di Dashboard
                        </h2>

                        <p>
                            Sistem Informasi TK Mekar Tigo Jangko
                        </p>

                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="hero-status">

                        <span>
                            <span class="status-dot"></span>
                            Sistem Aktif
                        </span>

                        <strong>
                            Administrator
                        </strong>

                    </div>
                </div>

            </div>

        </div>


        {{-- =========================
         STATISTIK UTAMA
    ========================== --}}
        <div class="row g-4 mb-4">

            {{-- Guru --}}
            <div class="col-xl-3 col-lg-6 col-md-6">

                <div class="stat-card blue">

                    <div class="stat-body">

                        <div class="stat-icon blue">
                            <i class="ti ti-users"></i>
                        </div>

                        <div class="stat-title">
                            Data Guru
                        </div>

                        <div class="stat-number">
                            {{ $jumlahGuru }}
                        </div>

                        <p class="stat-description">
                            Total data guru sekolah
                        </p>

                    </div>

                </div>

            </div>


            {{-- Foto --}}
            <div class="col-xl-3 col-lg-6 col-md-6">

                <div class="stat-card green">

                    <div class="stat-body">

                        <div class="stat-icon green">
                            <i class="ti ti-photo"></i>
                        </div>

                        <div class="stat-title">
                            Galeri Foto
                        </div>

                        <div class="stat-number">
                            {{ $jumlahFoto }}
                        </div>

                        <p class="stat-description">
                            Koleksi foto sekolah
                        </p>

                    </div>

                </div>

            </div>


            {{-- Berita --}}
            <div class="col-xl-3 col-lg-6 col-md-6">

                <div class="stat-card orange">

                    <div class="stat-body">

                        <div class="stat-icon orange">
                            <i class="ti ti-news"></i>
                        </div>

                        <div class="stat-title">
                            Berita
                        </div>

                        <div class="stat-number">
                            {{ $jumlahBerita }}
                        </div>

                        <p class="stat-description">
                            Total berita sekolah
                        </p>

                    </div>

                </div>

            </div>


            {{-- Struktur --}}
            <div class="col-xl-3 col-lg-6 col-md-6">

                <div class="stat-card purple">

                    <div class="stat-body">

                        <div class="stat-icon purple">
                            <i class="ti ti-sitemap"></i>
                        </div>

                        <div class="stat-title">
                            Struktur Organisasi
                        </div>

                        <div class="stat-number">
                            {{ $jumlahStruktur }}
                        </div>

                        <p class="stat-description">
                            Data struktur sekolah
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================
         INFORMASI + RINGKASAN
    ========================== --}}
        <div class="row g-4 mb-4">

            {{-- Welcome --}}
            <div class="col-lg-8">

                <div class="welcome-card">

                    <div class="card-body p-4">

                        <div class="welcome-icon">
                            <i class="ti ti-school"></i>
                        </div>

                        <h4>
                            Selamat Datang, Administrator
                        </h4>

                        <p>
                            Selamat datang di halaman administrasi
                            <strong>TK Mekar Tigo Jangko</strong>.
                            Dashboard ini digunakan untuk mengelola dan memantau
                            informasi sekolah secara terpusat.
                        </p>

                        <p class="mt-2">
                            Gunakan menu navigasi di sebelah kiri untuk mengelola
                            Profil Sekolah, Visi Misi, Guru, Fasilitas, Galeri,
                            Berita, Struktur Organisasi, PPDB, dan Kontak.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Informasi Sistem --}}
            <div class="col-lg-4">

                <div class="dashboard-card h-100">

                    <div class="dashboard-card-header">
                        <h5>Ringkasan Sistem</h5>
                        <p>Informasi data website saat ini</p>
                    </div>

                    <div class="dashboard-card-body">

                        <div class="info-item">

                            <div class="info-icon">
                                <i class="ti ti-users"></i>
                            </div>

                            <div>
                                <strong>Guru</strong>
                                <span>{{ $jumlahGuru }} data tersedia</span>
                            </div>

                        </div>


                        <div class="info-item">

                            <div class="info-icon">
                                <i class="ti ti-photo"></i>
                            </div>

                            <div>
                                <strong>Galeri Foto</strong>
                                <span>{{ $jumlahFoto }} foto tersedia</span>
                            </div>

                        </div>


                        <div class="info-item">

                            <div class="info-icon">
                                <i class="ti ti-news"></i>
                            </div>

                            <div>
                                <strong>Berita</strong>
                                <span>{{ $jumlahBerita }} berita tersedia</span>
                            </div>

                        </div>


                        <div class="info-item">

                            <div class="info-icon">
                                <i class="ti ti-sitemap"></i>
                            </div>

                            <div>
                                <strong>Struktur Organisasi</strong>
                                <span>{{ $jumlahStruktur }} data tersedia</span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


    {{-- =========================
         GRAFIK
    ========================== --}}
        <div class="dashboard-card">

            <div class="dashboard-card-header">

                <h5>
                    Ringkasan Data Sistem
                </h5>

                <p>
                    Ringkasan jumlah data yang tersedia pada sistem
                </p>

            </div>

            <div class="dashboard-card-body">

                <div id="chart-data"></div>

            </div>

        </div>

    </div>

@endsection


@section('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            var chartElement = document.querySelector("#chart-data");

            if (
                chartElement &&
                typeof ApexCharts !== "undefined"
            ) {

                var options = {

                    chart: {
                        type: "bar",
                        height: 330,
                        toolbar: {
                            show: false
                        }
                    },

                    series: [{
                        name: "Jumlah Data",
                        data: [
                            {{ $jumlahGuru }},
                            {{ $jumlahFoto }},
                            {{ $jumlahBerita }},
                            {{ $jumlahStruktur }}
                        ]
                    }],

                    xaxis: {
                        categories: [
                            "Guru",
                            "Foto",
                            "Berita",
                            "Struktur"
                        ],

                        labels: {
                            style: {
                                fontSize: "13px"
                            }
                        }
                    },

                    yaxis: {
                        min: 0,
                        forceNiceScale: true
                    },

                    plotOptions: {
                        bar: {
                            borderRadius: 7,
                            columnWidth: "45%",
                            distributed: true
                        }
                    },

                    dataLabels: {
                        enabled: true,
                        style: {
                            fontSize: "13px",
                            fontWeight: "600"
                        }
                    },

                    legend: {
                        show: false
                    },

                    grid: {
                        borderColor: "#eef2f7",
                        strokeDashArray: 4
                    },

                    tooltip: {
                        theme: "light"
                    }
                };

                var chart = new ApexCharts(
                    chartElement,
                    options
                );

                chart.render();
            }

        });
    </script>

@endsection
