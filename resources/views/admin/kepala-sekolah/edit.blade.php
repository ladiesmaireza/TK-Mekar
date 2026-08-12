@extends('layouts.admin')

@section('title', 'Edit Kepala Sekolah')

@section('content')

    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="mb-4">
            <h4 class="fw-bold mb-1">
                Edit Kepala Sekolah
            </h4>

            <p class="text-muted mb-0">
                Kelola informasi Kepala Sekolah TK Mekar Tigo Jangko
            </p>
        </div>


        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="ti ti-check me-1"></i>
                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert">
                </button>
            </div>
        @endif


        {{-- ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- FORM --}}
        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                <form action="{{ route('admin.kepala-sekolah.update') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    {{-- NAMA --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Nama Kepala Sekolah
                        </label>

                        <input type="text" name="nama_kepala_sekolah" class="form-control"
                            value="{{ old('nama_kepala_sekolah', $kepalaSekolah->nama_kepala_sekolah) }}"
                            placeholder="Masukkan nama kepala sekolah">

                    </div>


                    {{-- FOTO --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Foto Kepala Sekolah
                        </label>

                        @if ($kepalaSekolah->foto)
                            <div class="mb-3">

                                <img src="{{ asset('storage/' . $kepalaSekolah->foto) }}" alt="Foto Kepala Sekolah"
                                    style="
                                    width: 180px;
                                    height: 220px;
                                    object-fit: cover;
                                    border-radius: 12px;
                                    border: 1px solid #ddd;
                                ">

                            </div>
                        @endif


                        <input type="file" name="foto" class="form-control"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">

                        <small class="text-muted">
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                        </small>

                    </div>


                    {{-- SAMBUTAN --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Sambutan Kepala Sekolah
                        </label>

                        <textarea name="sambutan" rows="12" class="form-control" placeholder="Tuliskan sambutan kepala sekolah...">{{ old('sambutan', $kepalaSekolah->sambutan) }}</textarea>

                        <small class="text-muted">
                            Isi sambutan yang akan ditampilkan pada halaman
                            profil sekolah.
                        </small>

                    </div>


                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-end gap-2">

                        <a href="{{ route('admin.kepala-sekolah.index') }}" class="btn btn-light">
                            <i class="ti ti-arrow-left me-1"></i>
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i>
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
