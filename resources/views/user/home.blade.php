@extends('layouts.user')

@section('title', 'Beranda - TK Mekar Tigo Jangko')

@section('content')

    <!-- HERO -->

    <section class="py-5" style="background: linear-gradient(135deg, #e8f5e9, #ffffff);">

        <div class="container">

            <div class="row align-items-center py-5">

                <div class="col-lg-7">

                    <span class="badge bg-success mb-3 px-3 py-2">
                        Website Resmi Sekolah
                    </span>

                    <h1 class="display-5 fw-bold mb-3">

                        Selamat Datang di
                        <span class="text-success">
                            TK Mekar Tigo Jangko
                        </span>

                    </h1>

                    <p class="lead text-muted mb-4">

                        Mewujudkan pendidikan anak usia dini
                        yang ceria, kreatif, mandiri, dan
                        berkarakter.

                    </p>

                    <div class="d-flex gap-2 flex-wrap">

                        <a href="{{ url('/profil/sambutan') }}" class="btn btn-success btn-lg">

                            <i class="bi bi-building"></i>

                            Tentang Sekolah

                        </a>

                        <a href="{{ url('/ppdb/form') }}" class="btn btn-outline-success btn-lg">

                            <i class="bi bi-pencil-square"></i>

                            Daftar PPDB

                        </a>

                    </div>

                </div>


                <div class="col-lg-5 text-center mt-4 mt-lg-0">

                    <img src="{{ asset('assets/images/logo.png') }}" alt="TK Mekar Tigo Jangko" class="img-fluid"
                        style="max-width:280px;">

                </div>

            </div>

        </div>

    </section>


    <!-- MENU UTAMA -->

    <section class="py-5">

        <div class="container">

            <div class="text-center mb-5">

                <span class="text-success fw-semibold">
                    INFORMASI SEKOLAH
                </span>

                <h2 class="fw-bold mt-2">
                    Jelajahi TK Mekar Tigo Jangko
                </h2>

                <p class="text-muted">
                    Temukan berbagai informasi mengenai sekolah kami.
                </p>

            </div>


            <div class="row g-4">


                <!-- PROFIL -->

                <div class="col-md-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-building text-success" style="font-size:45px;">
                            </i>

                            <h5 class="fw-bold mt-3">
                                Profil Sekolah
                            </h5>

                            <p class="text-muted">
                                Kenali lebih dekat TK Mekar Tigo Jangko.
                            </p>

                            <a href="{{ url('/profil/sambutan') }}" class="btn btn-outline-success">

                                Lihat Profil

                            </a>

                        </div>

                    </div>

                </div>


                <!-- GURU -->

                <div class="col-md-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-people text-success" style="font-size:45px;">
                            </i>

                            <h5 class="fw-bold mt-3">
                                Data Guru
                            </h5>

                            <p class="text-muted">
                                Lihat informasi tenaga pendidik sekolah.
                            </p>

                            <a href="{{ url('/guru') }}" class="btn btn-outline-success">

                                Lihat Guru

                            </a>

                        </div>

                    </div>

                </div>


                <!-- FASILITAS -->

                <div class="col-md-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-house-heart text-success" style="font-size:45px;">
                            </i>

                            <h5 class="fw-bold mt-3">
                                Fasilitas
                            </h5>

                            <p class="text-muted">
                                Lihat berbagai fasilitas yang tersedia.
                            </p>

                            <a href="{{ url('/fasilitas') }}" class="btn btn-outline-success">

                                Lihat Fasilitas

                            </a>

                        </div>

                    </div>

                </div>


                <!-- GALERI -->

                <div class="col-md-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-images text-success" style="font-size:45px;">
                            </i>

                            <h5 class="fw-bold mt-3">
                                Galeri
                            </h5>

                            <p class="text-muted">
                                Lihat dokumentasi kegiatan sekolah.
                            </p>

                            <a href="{{ url('/galeri/foto') }}" class="btn btn-outline-success">

                                Lihat Galeri

                            </a>

                        </div>

                    </div>

                </div>


                <!-- BERITA -->

                <div class="col-md-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-newspaper text-success" style="font-size:45px;">
                            </i>

                            <h5 class="fw-bold mt-3">
                                Berita
                            </h5>

                            <p class="text-muted">
                                Dapatkan informasi dan berita terbaru.
                            </p>

                            <a href="{{ url('/berita') }}" class="btn btn-outline-success">

                                Lihat Berita

                            </a>

                        </div>

                    </div>

                </div>


                <!-- KONTAK -->

                <div class="col-md-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body text-center p-4">

                            <i class="bi bi-telephone text-success" style="font-size:45px;">
                            </i>

                            <h5 class="fw-bold mt-3">
                                Kontak

                            </h5>

                            <p class="text-muted">
                                Hubungi TK Mekar Tigo Jangko.
                            </p>

                            <a href="{{ url('/kontak') }}" class="btn btn-outline-success">

                                Hubungi Kami

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- PPDB -->

    <section class="py-5" style="background:#f1f8f4;">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <span class="text-success fw-semibold">
                        PENERIMAAN PESERTA DIDIK BARU
                    </span>

                    <h2 class="fw-bold mt-2">
                        PPDB TK Mekar Tigo Jangko
                    </h2>

                    <p class="text-muted">

                        Daftarkan putra-putri Anda melalui
                        sistem pendaftaran online yang mudah,
                        cepat, dan terintegrasi.

                    </p>

                </div>


                <div class="col-lg-4 text-lg-end">

                    <a href="{{ url('/ppdb/form') }}" class="btn btn-success btn-lg">

                        <i class="bi bi-pencil-square"></i>

                        Daftar Sekarang

                    </a>

                </div>

            </div>

        </div>

    </section>

@endsection
