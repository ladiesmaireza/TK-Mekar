@extends('layouts.admin')

@section('title', 'Edit Profil Sekolah')

@section('content')

    <div class="container-fluid">

        <div class="card shadow-sm border-0">

            <div class="card-body p-4">

                <h4 class="fw-bold mb-4">
                    Edit Profil Sekolah
                </h4>

                @if ($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif


                <form action="{{ route('profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    {{-- Nama Sekolah --}}
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Nama Sekolah
                        </label>

                        <input type="text" name="nama_sekolah" class="form-control"
                            value="{{ old('nama_sekolah', $profil->nama_sekolah) }}" required>

                    </div>


                    {{-- Alamat --}}
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Alamat
                        </label>

                        <textarea name="alamat" rows="3" class="form-control" required>{{ old('alamat', $profil->alamat) }}</textarea>

                    </div>


                    {{-- Telepon --}}
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Telepon
                        </label>

                        <input type="text" name="telepon" class="form-control"
                            value="{{ old('telepon', $profil->telepon) }}" required>

                    </div>


                    {{-- Email --}}
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Email
                        </label>

                        <input type="email" name="email" class="form-control" value="{{ old('email', $profil->email) }}"
                            required>

                    </div>


                    {{-- Sejarah --}}
                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Sejarah Sekolah
                        </label>

                        <textarea name="sejarah" rows="7" class="form-control" required>{{ old('sejarah', $profil->sejarah) }}</textarea>

                    </div>


                    {{-- Foto Kepala Sekolah --}}
                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            Foto Kepala Sekolah
                        </label>

                        @if ($profil->foto_kepala_sekolah)
                            <div class="mb-3">

                                <img src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}"
                                    style="width:150px;height:190px;object-fit:cover;" class="rounded shadow">

                            </div>
                        @endif

                        <input type="file" name="foto_kepala_sekolah" class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">
                            Format JPG, JPEG, PNG atau WEBP. Maksimal 2 MB.
                        </small>

                    </div>


                    {{-- Sambutan Kepala Sekolah --}}
                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            Sambutan Kepala Sekolah
                        </label>

                        <textarea name="sambutan_kepala_sekolah" rows="12" class="form-control"
                            placeholder="Masukkan sambutan kepala sekolah...">{{ old('sambutan_kepala_sekolah', $profil->sambutan_kepala_sekolah) }}</textarea>

                    </div>


                    {{-- Tombol --}}
                    <div class="d-flex gap-2">

                        <button type="submit" class="btn btn-primary">

                            Simpan Perubahan

                        </button>

                        <a href="{{ route('profil.index') }}" class="btn btn-secondary">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
