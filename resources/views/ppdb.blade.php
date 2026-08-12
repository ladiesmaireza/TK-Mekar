@extends('layouts.app')

@section('content')

    <section class="py-5 bg-light">

        <div class="container">

            @if ($ppdb)
                <!-- Judul -->
                <div class="text-center mb-5">

                    <h2 class="fw-bold text-uppercase">

                        {{ $ppdb->judul }}

                    </h2>

                    <hr class="mx-auto" style="width:120px;height:4px;background:#22c3b3;border:none;opacity:1;">

                    <p class="text-muted mt-3">

                        {{ $ppdb->deskripsi }}

                    </p>

                </div>

                <!-- Status -->
                <div class="text-center mb-5">

                    @if ($ppdb->status == 'Buka')
                        <span class="badge bg-success fs-6 px-4 py-2">

                            PENDAFTARAN DIBUKA

                        </span>
                    @else
                        <span class="badge bg-danger fs-6 px-4 py-2">

                            PENDAFTARAN DITUTUP

                        </span>
                    @endif

                </div>

                <div class="row">

                    <!-- Jadwal -->
                    <div class="col-lg-6 mb-4">

                        <div class="card shadow border-0 h-100">

                            <div class="card-header text-white fw-bold" style="background:#22c3b3;">

                                📅 Jadwal Pendaftaran

                            </div>

                            <div class="card-body">

                                {!! nl2br(e($ppdb->jadwal)) !!}

                            </div>

                        </div>

                    </div>

                    <!-- Informasi -->
                    <div class="col-lg-6 mb-4">

                        <div class="card shadow border-0 h-100">

                            <div class="card-header text-white fw-bold" style="background:#22c3b3;">

                                📞 Informasi

                            </div>

                            <div class="card-body">

                                <p>

                                    <strong>Nomor HP</strong><br>

                                    {{ $ppdb->kontak }}

                                </p>

                                <hr>

                                <p>

                                    <strong>Email</strong><br>

                                    {{ $ppdb->email }}

                                </p>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- Alur -->
                <div class="card shadow border-0">

                    <div class="card-header text-white fw-bold" style="background:#22c3b3;">

                        🚸 Alur Pendaftaran

                    </div>

                    <div class="card-body">

                        {!! nl2br(e($ppdb->alur)) !!}

                    </div>

                </div>
            @else
                <div class="alert alert-warning text-center">

                    <h4>Data PPDB Belum Tersedia</h4>

                    <p>Silakan login sebagai admin dan tambahkan data PPDB terlebih dahulu.</p>

                </div>
            @endif

            <div class="text-center mt-5">

                <a href="{{ route('home') }}" class="btn btn-success">
                    ← Kembali ke Beranda
                </a>

                @if ($ppdb && $ppdb->status == 'Buka')
                    <a href="{{ route('ppdb.akun') }}" class="btn btn-success px-4">
                        📝 Form Pendaftaran
                    </a>
                @endif

            </div>

        </div>

    </section>

@endsection
