@extends('layouts.admin')

@section('title', 'Edit Sejarah Sekolah')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">
                Edit Sejarah Sekolah
            </h4>

            <p class="text-muted mb-0">
                Perbarui informasi sejarah TK Mekar Tigo Jangko.
            </p>

        </div>


        <a href="{{ route('admin.sejarah-sekolah.index') }}"
           class="btn btn-light border">

            <i class="ti ti-arrow-left me-1"></i>
            Kembali

        </a>

    </div>


    {{-- VALIDATION ERROR --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>
                Terjadi kesalahan:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <h5 class="fw-bold mb-0">
                Form Sejarah Sekolah
            </h5>

        </div>


        <div class="card-body">

            <form
                action="{{ route('admin.sejarah-sekolah.update') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                {{-- NAMA SEKOLAH --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Nama Sekolah
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ $profil->nama_sekolah }}"
                        readonly
                    >

                </div>


                {{-- SEJARAH --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Sejarah Sekolah
                        <span class="text-danger">*</span>
                    </label>

                    <textarea
                        name="sejarah"
                        rows="10"
                        class="form-control @error('sejarah') is-invalid @enderror"
                        placeholder="Masukkan sejarah sekolah..."
                        required
                    >{{ old('sejarah', $profil->sejarah) }}</textarea>


                    @error('sejarah')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- FOTO LAMA --}}
                @if ($profil->foto_sejarah)

                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Foto Sejarah Saat Ini
                        </label>

                        <div>

                            <img
                                src="{{ asset('storage/' . $profil->foto_sejarah) }}"
                                alt="Foto Sejarah"
                                class="rounded shadow-sm"
                                style="
                                    width: 300px;
                                    height: 200px;
                                    object-fit: cover;
                                "
                            >

                        </div>

                    </div>

                @endif


                {{-- FOTO BARU --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Ganti Foto Sejarah
                    </label>

                    <input
                        type="file"
                        name="foto_sejarah"
                        class="form-control @error('foto_sejarah') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <small class="text-muted">
                        Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </small>


                    @error('foto_sejarah')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- BUTTON --}}
                <div class="d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="ti ti-device-floppy me-1"></i>
                        Simpan Perubahan

                    </button>


                    <a
                        href="{{ route('admin.sejarah-sekolah.index') }}"
                        class="btn btn-light border"
                    >

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
