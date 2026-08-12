@extends('layouts.admin')

@section('title', 'Tambah Pengguna')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-0">Tambah Pengguna</h4>
            <p class="text-muted mb-0">
                Buat akun Admin atau Super Admin baru.
            </p>
        </div>

        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            <i class="ti ti-arrow-left me-1"></i>
            Kembali
        </a>
        ```

    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            ```
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        ```
    @endif

    {{-- Error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            ```
            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>

        </div>
        ```

    @endif

    <div class="card border-0 shadow-sm">

        ```
        <div class="card-body p-4">

            <form action="{{ route('users.store') }}" method="POST">

                @csrf

                {{-- Nama --}}
                <div class="mb-3">

                    <label for="name" class="form-label">
                        Nama Lengkap
                        <span class="text-danger">*</span>
                    </label>

                    <input type="text" id="name" name="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap" maxlength="255" required autofocus>

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Email --}}
                <div class="mb-3">

                    <label for="email" class="form-label">
                        Email
                        <span class="text-danger">*</span>
                    </label>

                    <input type="email" id="email" name="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                        placeholder="contoh@email.com" maxlength="255" required>

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="row">

                    {{-- Password --}}
                    <div class="col-md-6 mb-3">

                        <label for="password" class="form-label">
                            Password
                            <span class="text-danger">*</span>
                        </label>

                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 6 karakter"
                            minlength="6" required>

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <small class="text-muted">
                            Gunakan minimal 6 karakter.
                        </small>

                    </div>

                    {{-- Konfirmasi Password --}}
                    <div class="col-md-6 mb-3">

                        <label for="password_confirmation" class="form-label">
                            Konfirmasi Password
                            <span class="text-danger">*</span>
                        </label>

                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Ulangi password" minlength="6" required>

                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                {{-- Role --}}
                <div class="mb-4">

                    <label for="role" class="form-label">
                        Role Pengguna
                        <span class="text-danger">*</span>
                    </label>

                    <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>

                        <option value="">-- Pilih Role --</option>

                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="super_admin" {{ old('role') === 'super_admin' ? 'selected' : '' }}>
                            Super Admin
                        </option>

                    </select>

                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <small class="text-muted">
                        Admin dapat mengelola data sekolah.
                        Super Admin memiliki akses penuh termasuk manajemen pengguna.
                    </small>

                </div>

                {{-- Tombol --}}
                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-success">
                        <i class="ti ti-device-floppy me-1"></i>
                        Simpan Pengguna
                    </button>

                    <a href="{{ route('users.index') }}" class="btn btn-light">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
