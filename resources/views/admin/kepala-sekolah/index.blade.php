@extends('layouts.admin')

@section('title', 'Kepala Sekolah')

@section('content')

    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h4 class="fw-bold mb-1">
                    Kepala Sekolah
                </h4>

                <p class="text-muted mb-0">
                    Informasi Kepala Sekolah TK Mekar Tigo Jangko
                </p>
            </div>

            <a href="{{ route('admin.kepala-sekolah.edit') }}" class="btn btn-primary">
                <i class="ti ti-edit me-1"></i>
                Edit Data
            </a>

        </div>


        {{-- ALERT SUCCESS --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <i class="ti ti-check me-2"></i>

                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        @endif


        {{-- DATA KEPALA SEKOLAH --}}
        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                @if ($kepalaSekolah)

                    {{-- FOTO DAN NAMA --}}
                    <div class="row mb-4">

                        {{-- FOTO --}}
                        <div class="col-md-3 text-center">

                            @if ($kepalaSekolah->foto)
                                <img src="{{ asset('storage/' . $kepalaSekolah->foto) }}" alt="Foto Kepala Sekolah"
                                    class="img-fluid rounded-3 shadow-sm"
                                    style="
                                width: 180px;
                                height: 220px;
                                object-fit: cover;
                            ">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light rounded-3"
                                    style="
                                width: 180px;
                                height: 220px;
                                margin: 0 auto;
                            ">

                                    <div class="text-center text-muted">

                                        <i class="ti ti-user" style="font-size: 50px;"></i>

                                        <div class="mt-2">
                                            Foto belum tersedia
                                        </div>

                                    </div>

                                </div>
                            @endif

                        </div>


                        {{-- NAMA --}}
                        <div class="col-md-9">

                            <label class="fw-bold text-dark mb-2">
                                Nama Kepala Sekolah
                            </label>

                            <div class="form-control bg-light mb-4">
                                {{ $kepalaSekolah->nama_kepala_sekolah ?: 'Belum diisi' }}
                            </div>

                            <div class="alert alert-light border mb-0">

                                <i class="ti ti-school me-2"></i>

                                <strong>
                                    Kepala TK Mekar Tigo Jangko
                                </strong>

                            </div>

                        </div>

                    </div>


                    {{-- SAMBUTAN --}}
                    <div class="mb-2">

                        <label class="fw-bold text-dark mb-2">
                            Sambutan Kepala Sekolah
                        </label>

                        <div class="border rounded p-3 bg-light"
                            style="
                        min-height: 150px;
                        white-space: pre-line;
                        line-height: 1.8;
                    ">
                            @if ($kepalaSekolah->sambutan)
                                {{ $kepalaSekolah->sambutan }}
                            @else
                                <span class="text-muted">
                                    Belum ada sambutan kepala sekolah.
                                </span>
                            @endif
                        </div>

                    </div>
                @else
                    {{-- DATA BELUM ADA --}}
                    <div class="text-center py-5">

                        <i class="ti ti-user-off text-muted" style="font-size: 50px;"></i>

                        <h5 class="mt-3">
                            Data Kepala Sekolah Belum Ada
                        </h5>

                        <p class="text-muted">
                            Silakan tambahkan data Kepala Sekolah.
                        </p>

                        <a href="{{ route('admin.kepala-sekolah.edit') }}" class="btn btn-primary">
                            <i class="ti ti-plus me-1"></i>
                            Tambah Data
                        </a>

                    </div>

                @endif

            </div>

        </div>

    </div>

@endsection
