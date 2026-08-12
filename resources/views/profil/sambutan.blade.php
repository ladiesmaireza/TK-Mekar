@extends('layouts.app')

@section('content')

    <section class="py-5" style="background: #f8fafc;">

        <div class="container">

            {{-- HEADER --}}
            <div class="text-center mb-5">

                <h1 class="fw-bold text-success mb-3">
                    Sambutan Kepala Sekolah
                </h1>

                <p class="text-muted mb-0">
                    Sambutan Kepala TK Mekar Tigo Jangko
                </p>

            </div>


            {{-- DATA KEPALA SEKOLAH --}}
            @if ($kepalaSekolah)
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                    <div class="row g-0">

                        {{-- FOTO --}}
                        <div class="col-lg-5">

                            @if ($kepalaSekolah->foto)
                                <img src="{{ asset('storage/' . $kepalaSekolah->foto) }}"
                                    alt="Foto {{ $kepalaSekolah->nama_kepala_sekolah }}" class="img-fluid w-100"
                                    style="
                                    height: 100%;
                                    min-height: 600px;
                                    object-fit: cover;
                                ">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light"
                                    style="
                                    min-height: 600px;
                                ">

                                    <div class="text-center text-muted">

                                        <i class="ti ti-user" style="font-size: 80px;"></i>

                                        <p class="mt-3 mb-0">
                                            Foto Kepala Sekolah belum tersedia
                                        </p>

                                    </div>

                                </div>
                            @endif

                        </div>


                        {{-- ISI --}}
                        <div class="col-lg-7">

                            <div class="p-5">

                                {{-- NAMA --}}
                                <h2 class="fw-bold text-success mb-1">

                                    {{ $kepalaSekolah->nama_kepala_sekolah }}

                                </h2>

                                <p class="text-muted mb-4">

                                    Kepala TK Mekar Tigo Jangko

                                </p>


                                {{-- GARIS --}}
                                <div style="
                                    width: 60px;
                                    height: 4px;
                                    background: #198754;
                                    border-radius: 5px;
                                "
                                    class="mb-4"></div>


                                {{-- JUDUL --}}
                                <h3 class="fw-bold text-success mb-4">

                                    Sambutan Kepala Sekolah

                                </h3>


                                {{-- SAMBUTAN --}}
                                @if ($kepalaSekolah->sambutan)
                                    <div
                                        style="
                                        text-align: justify;
                                        line-height: 2;
                                        font-size: 17px;
                                        color: #444;
                                    ">

                                        {!! nl2br(e($kepalaSekolah->sambutan)) !!}

                                    </div>
                                @else
                                    <div class="alert alert-info">

                                        Sambutan Kepala Sekolah belum tersedia.

                                    </div>
                                @endif


                                {{-- PENUTUP --}}
                                @if ($kepalaSekolah->sambutan)
                                    <div class="mt-4">

                                        <p style="line-height: 2;">

                                            Wassalamu’alaikum Warahmatullahi
                                            Wabarakatuh.

                                        </p>


                                        <div class="mt-4">

                                            <p class="mb-1">
                                                Hormat kami,
                                            </p>

                                            <p class="fw-bold text-success mb-0">

                                                {{ $kepalaSekolah->nama_kepala_sekolah }}

                                            </p>

                                            <p class="text-muted mb-0">

                                                Kepala TK Mekar Tigo Jangko

                                            </p>

                                        </div>

                                    </div>
                                @endif

                            </div>

                        </div>

                    </div>

                </div>
            @else
                {{-- BELUM ADA DATA --}}

                <div class="alert alert-warning text-center">

                    Data Kepala Sekolah belum tersedia.

                </div>
            @endif

        </div>

    </section>

@endsection
