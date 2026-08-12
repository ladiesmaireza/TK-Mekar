@extends('layouts.admin')

@section('title', 'Kontak Sekolah')

@section('content')

    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h4 class="fw-bold mb-1">
                    Kontak Sekolah
                </h4>

                <p class="text-muted mb-0">
                    Kelola informasi kontak TK Mekar Tigo Jangko.
                </p>
            </div>

            @if ($kontak)
                <a href="{{ route('kontak.edit', $kontak->id) }}" class="btn btn-primary">

                    <i class="ti ti-edit me-1"></i>

                    Edit Kontak
                </a>
            @else
                <a href="{{ route('kontak.create') }}" class="btn btn-primary">

                    <i class="ti ti-plus me-1"></i>

                    Tambah Kontak
                </a>
            @endif

        </div>


        {{-- SUCCESS --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">

                <i class="ti ti-check me-2"></i>

                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert">
                </button>

            </div>
        @endif


        {{-- ERROR --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">

                <i class="ti ti-alert-circle me-2"></i>

                {{ session('error') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert">
                </button>

            </div>
        @endif


        @if ($kontak)

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <div class="row g-4">

                        {{-- ALAMAT --}}
                        <div class="col-md-6">

                            <div class="contact-card">

                                <div class="contact-icon">
                                    <i class="ti ti-map-pin"></i>
                                </div>

                                <div>

                                    <h6 class="fw-bold mb-2">
                                        Alamat Sekolah
                                    </h6>

                                    <div class="text-muted" style="white-space: pre-line;">
                                        {{ $kontak->alamat }}
                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- TELEPON --}}
                        <div class="col-md-6">

                            <div class="contact-card">

                                <div class="contact-icon">
                                    <i class="ti ti-phone"></i>
                                </div>

                                <div>

                                    <h6 class="fw-bold mb-2">
                                        Nomor Telepon
                                    </h6>

                                    <a href="tel:{{ $kontak->nomor_telepon }}" class="text-decoration-none">

                                        {{ $kontak->nomor_telepon }}

                                    </a>

                                </div>

                            </div>

                        </div>


                        {{-- EMAIL --}}
                        <div class="col-md-6">

                            <div class="contact-card">

                                <div class="contact-icon">
                                    <i class="ti ti-mail"></i>
                                </div>

                                <div>

                                    <h6 class="fw-bold mb-2">
                                        Email
                                    </h6>

                                    <a href="mailto:{{ $kontak->email }}" class="text-decoration-none">

                                        {{ $kontak->email }}

                                    </a>

                                </div>

                            </div>

                        </div>


                        {{-- FACEBOOK --}}
                        <div class="col-md-6">

                            <div class="contact-card">

                                <div class="contact-icon">
                                    <i class="ti ti-brand-facebook"></i>
                                </div>

                                <div>

                                    <h6 class="fw-bold mb-2">
                                        Facebook
                                    </h6>

                                    @if (!empty($kontak->media_sosial['facebook']))
                                        <a href="{{ $kontak->media_sosial['facebook'] }}" target="_blank"
                                            rel="noopener noreferrer" class="text-decoration-none">

                                            Buka Facebook

                                            <i class="ti ti-external-link ms-1"></i>

                                        </a>
                                    @else
                                        <span class="text-muted">
                                            Belum diatur
                                        </span>
                                    @endif

                                </div>

                            </div>

                        </div>


                        {{-- INSTAGRAM --}}
                        <div class="col-md-6">

                            <div class="contact-card">

                                <div class="contact-icon">
                                    <i class="ti ti-brand-instagram"></i>
                                </div>

                                <div>

                                    <h6 class="fw-bold mb-2">
                                        Instagram
                                    </h6>

                                    @if (!empty($kontak->media_sosial['instagram']))
                                        <a href="{{ $kontak->media_sosial['instagram'] }}" target="_blank"
                                            rel="noopener noreferrer" class="text-decoration-none">

                                            Buka Instagram

                                            <i class="ti ti-external-link ms-1"></i>

                                        </a>
                                    @else
                                        <span class="text-muted">
                                            Belum diatur
                                        </span>
                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        @else
            <div class="card border-0 shadow-sm">

                <div class="card-body text-center py-5">

                    <i class="ti ti-address-book-off" style="font-size:50px;">
                    </i>

                    <h5 class="fw-bold mt-3">
                        Data Kontak Belum Ada
                    </h5>

                    <p class="text-muted">
                        Silakan tambahkan informasi kontak sekolah.
                    </p>

                    <a href="{{ route('kontak.create') }}" class="btn btn-primary">

                        <i class="ti ti-plus me-1"></i>

                        Tambah Kontak

                    </a>

                </div>

            </div>

        @endif

    </div>


    <style>
        .contact-card {
            display: flex;
            align-items: flex-start;
            gap: 18px;

            padding: 22px;

            height: 100%;

            background: #f8fafc;

            border: 1px solid #edf0f4;

            border-radius: 14px;

            transition: all .2s ease;
        }

        .contact-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
        }

        .contact-icon {
            width: 46px;
            height: 46px;

            min-width: 46px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: #22c3b3;

            color: white;

            font-size: 22px;
        }

        .contact-card h6 {
            color: #343a40;
        }
    </style>

@endsection
