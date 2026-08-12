@extends('layouts.admin')

@section('title', 'Edit Kontak')

@section('content')

    <div class="container-fluid">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white py-3">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h4 class="fw-bold mb-1">
                            Edit Kontak Sekolah
                        </h4>

                        <p class="text-muted mb-0">
                            Kelola informasi kontak TK Mekar Tigo Jangko
                        </p>
                    </div>

                    <a href="{{ route('kontak.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-1"></i>
                        Kembali
                    </a>

                </div>
            </div>


            <div class="card-body p-4">

                {{-- PESAN ERROR --}}

                @if ($errors->any())

                    <div class="alert alert-danger">

                        <strong>
                            Terjadi kesalahan!
                        </strong>

                        <ul class="mb-0 mt-2">

                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- PESAN SUKSES --}}

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                <form action="{{ route('kontak.update', $kontak->id) }}" method="POST">

                    @csrf
                    @method('PUT')


                    {{-- ================= ALAMAT ================= --}}

                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            <i class="ti ti-map-pin me-1"></i>
                            Alamat Sekolah
                        </label>

                        <textarea name="alamat" class="form-control" rows="5" placeholder="Masukkan alamat sekolah" required>{{ old('alamat', $kontak->alamat) }}</textarea>

                    </div>


                    {{-- ================= TELEPON ================= --}}

                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            <i class="ti ti-phone me-1"></i>
                            Nomor Telepon
                        </label>

                        <input type="text" name="nomor_telepon" class="form-control"
                            value="{{ old('nomor_telepon', $kontak->nomor_telepon) }}" placeholder="+62 823 7149 6967"
                            required>

                    </div>


                    {{-- ================= EMAIL ================= --}}

                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            <i class="ti ti-mail me-1"></i>
                            Email Sekolah
                        </label>

                        <input type="email" name="email" class="form-control" value="{{ old('email', $kontak->email) }}"
                            placeholder="tigojangkotkmekar@gmail.com" required>

                    </div>


                    {{-- ================= FACEBOOK ================= --}}

                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            <i class="fab fa-facebook text-primary me-1"></i>

                            Facebook

                        </label>

                        <input type="url" name="facebook" class="form-control"
                            value="{{ old('facebook', $mediaSosial['facebook'] ?? '') }}"
                            placeholder="https://www.facebook.com/...">

                        <small class="text-muted">
                            Masukkan URL Facebook resmi sekolah.
                        </small>

                    </div>


                    {{-- ================= INSTAGRAM ================= --}}

                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            <i class="fab fa-instagram text-danger me-1"></i>

                            Instagram

                        </label>

                        <input type="url" name="instagram" class="form-control"
                            value="{{ old('instagram', $mediaSosial['instagram'] ?? '') }}"
                            placeholder="https://www.instagram.com/...">

                        <small class="text-muted">
                            Masukkan URL Instagram resmi sekolah.
                        </small>

                    </div>


                    {{-- ================= TOMBOL ================= --}}

                    <div class="d-flex justify-content-end gap-2">

                        <a href="{{ route('kontak.index') }}" class="btn btn-light border">

                            <i class="ti ti-x me-1"></i>
                            Batal

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
