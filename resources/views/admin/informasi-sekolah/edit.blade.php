@extends('layouts.admin')

@section('content')

<div class="container-fluid">

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">Edit Informasi Sekolah</h4>
        <p class="text-muted mb-0">
            Perbarui informasi yang akan disampaikan kepada orang tua.
        </p>
    </div>

    <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>

{{-- Pesan validasi --}}
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

{{-- Pesan sukses --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <strong>Form Edit Informasi</strong>
    </div>

    <div class="card-body">

        <form
            action="{{ route('admin.informasi.update', $informasi->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="mb-3">
                <label for="judul" class="form-label">
                    Judul Informasi
                </label>

                <input
                    type="text"
                    name="judul"
                    id="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul', $informasi->judul) }}"
                    placeholder="Masukkan judul informasi"
                    required
                >

                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Isi --}}
            <div class="mb-3">
                <label for="isi" class="form-label">
                    Isi Informasi
                </label>

                <textarea
                    name="isi"
                    id="isi"
                    rows="8"
                    class="form-control @error('isi') is-invalid @enderror"
                    placeholder="Masukkan isi informasi"
                    required
                >{{ old('isi', $informasi->isi) }}</textarea>

                @error('isi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Penerima --}}
            <div class="mb-4">
                <label for="penerima" class="form-label">
                    Penerima Informasi
                </label>

                <select
                    name="penerima"
                    id="penerima"
                    class="form-select @error('penerima') is-invalid @enderror"
                    required
                >
                    <option value="semua"
                        {{ old('penerima', $informasi->penerima) == 'semua' ? 'selected' : '' }}>
                        Semua Orang Tua
                    </option>
                </select>

                @error('penerima')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <small class="text-muted">
                    Informasi ditujukan kepada seluruh orang tua yang memiliki email.
                </small>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-end gap-2">

                <a
                    href="{{ route('admin.informasi.index') }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>
</div>

</div>

@endsection
