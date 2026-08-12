@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    Tambah Data PPDB
                </h4>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('ppdb.store') }}" method="POST">

                    @csrf

                    <!-- Judul -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Judul PPDB <span class="text-danger">*</span>
                        </label>

                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul') }}" placeholder="Masukkan judul PPDB" required>

                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Deskripsi <span class="text-danger">*</span>
                        </label>

                        <textarea name="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror"
                            placeholder="Masukkan deskripsi PPDB" required>{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Jadwal -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Jadwal Pendaftaran
                        </label>

                        <textarea name="jadwal" rows="4" class="form-control @error('jadwal') is-invalid @enderror"
                            placeholder="Contoh:
Pendaftaran : 01 Januari - 30 Juni
Tes : 05 Juli
Pengumuman : 10 Juli">{{ old('jadwal') }}</textarea>

                        @error('jadwal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Persyaratan -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Persyaratan
                        </label>

                        <textarea name="persyaratan" rows="6" class="form-control @error('persyaratan') is-invalid @enderror"
                            placeholder="Masukkan persyaratan PPDB">{{ old('persyaratan') }}</textarea>

                        @error('persyaratan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Alur -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Alur Pendaftaran
                        </label>

                        <textarea name="alur" rows="6" class="form-control @error('alur') is-invalid @enderror"
                            placeholder="Masukkan alur pendaftaran">{{ old('alur') }}</textarea>

                        @error('alur')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Kontak -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Nomor Kontak
                        </label>

                        <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror"
                            value="{{ old('kontak') }}" placeholder="08xxxxxxxxxx">

                        @error('kontak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            Email
                        </label>

                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="admin@email.com">

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            Status PPDB
                        </label>

                        <select name="status" class="form-select">

                            <option value="Buka" {{ old('status') == 'Buka' ? 'selected' : '' }}>
                                Buka
                            </option>

                            <option value="Tutup" {{ old('status') == 'Tutup' ? 'selected' : '' }}>
                                Tutup
                            </option>

                        </select>
                    </div>

                    <div class="d-flex gap-2">

                        <button type="submit" class="btn btn-success">
                            Simpan Data
                        </button>

                        <a href="{{ route('ppdb.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
