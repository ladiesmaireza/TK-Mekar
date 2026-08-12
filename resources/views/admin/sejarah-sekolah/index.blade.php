@extends('layouts.admin')

@section('title', 'Sejarah Sekolah')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Sejarah Sekolah
            </h4>

            <p class="text-muted mb-0">
                Kelola informasi sejarah TK Mekar Tigo Jangko.
            </p>
        </div>

        @if ($profil)
            <a href="{{ route('admin.sejarah-sekolah.edit') }}"
               class="btn btn-primary">

                <i class="ti ti-edit me-1"></i>
                Edit Sejarah

            </a>
        @endif

    </div>


    {{-- SUCCESS --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">

            <i class="ti ti-check me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>
    @endif


    {{-- ERROR --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">

            <i class="ti ti-alert-circle me-2"></i>

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>
    @endif


    {{-- DATA TERSEDIA --}}
    @if ($profil)

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white py-3">

                <h5 class="mb-0 fw-bold">
                    Informasi Sejarah Sekolah
                </h5>

            </div>


            <div class="card-body">

                <div class="row g-4">

                    {{-- FOTO --}}
                    <div class="col-lg-5">

                        <div class="mb-2">

                            <label class="fw-semibold">
                                Foto Sejarah
                            </label>

                        </div>


                        @if ($profil->foto_sejarah)

                            <img
                                src="{{ asset('storage/' . $profil->foto_sejarah) }}"
                                alt="Foto Sejarah TK Mekar Tigo Jangko"
                                class="img-fluid rounded shadow-sm"
                                style="
                                    width: 100%;
                                    height: 320px;
                                    object-fit: cover;
                                "
                            >

                        @else

                            <div
                                class="border rounded d-flex align-items-center justify-content-center bg-light"
                                style="height:320px;"
                            >

                                <div class="text-center text-muted">

                                    <i class="ti ti-photo fs-1"></i>

                                    <div class="mt-2">
                                        Foto sejarah belum tersedia
                                    </div>

                                </div>

                            </div>

                        @endif

                    </div>


                    {{-- ISI SEJARAH --}}
                    <div class="col-lg-7">

                        <div class="mb-3">

                            <label class="text-muted small">
                                Nama Sekolah
                            </label>

                            <h5 class="fw-bold mb-0">
                                {{ $profil->nama_sekolah }}
                            </h5>

                        </div>


                        <div>

                            <label class="text-muted small mb-2">
                                Sejarah Sekolah
                            </label>

                            <div
                                class="border rounded p-3 bg-light"
                                style="
                                    line-height: 1.8;
                                    text-align: justify;
                                "
                            >

                                @if ($profil->sejarah)

                                    {!! nl2br(e($profil->sejarah)) !!}

                                @else

                                    <span class="text-muted">
                                        Sejarah sekolah belum diisi.
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @else

        {{-- DATA BELUM ADA --}}
        <div class="card border-0 shadow-sm">

            <div class="card-body text-center py-5">

                <i class="ti ti-school fs-1 text-muted"></i>

                <h5 class="fw-bold mt-3">
                    Data Profil Sekolah Belum Tersedia
                </h5>

                <p class="text-muted">
                    Silakan tambahkan data profil sekolah terlebih dahulu.
                </p>

                <a href="{{ route('profil.create') }}"
                   class="btn btn-primary">

                    <i class="ti ti-plus me-1"></i>
                    Tambah Profil Sekolah

                </a>

            </div>

        </div>

    @endif

</div>

@endsection
