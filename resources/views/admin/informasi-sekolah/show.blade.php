@extends('layouts.admin')

@section('content')

<div class="container-fluid">

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">Detail Informasi Sekolah</h4>
        <p class="text-muted mb-0">
            Detail informasi yang telah dibuat.
        </p>
    </div>

    <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <strong>Informasi Sekolah</strong>
    </div>

    <div class="card-body">

        <div class="mb-4">
            <label class="form-label fw-bold">
                Judul Informasi
            </label>

            <div class="border rounded p-3 bg-light">
                {{ $informasi->judul }}
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">
                Isi Informasi
            </label>

            <div class="border rounded p-3 bg-light">
                {!! nl2br(e($informasi->isi)) !!}
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">
                Penerima
            </label>

            <div>
                <span class="badge bg-primary">
                    {{ $informasi->penerima == 'semua' ? 'Semua Orang Tua' : $informasi->penerima }}
                </span>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">
                Dibuat
            </label>

            <div>
                {{ $informasi->created_at
                    ? $informasi->created_at->format('d-m-Y H:i')
                    : '-' }}
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">
                Terakhir Diperbarui
            </label>

            <div>
                {{ $informasi->updated_at
                    ? $informasi->updated_at->format('d-m-Y H:i')
                    : '-' }}
            </div>
        </div>

        <div class="d-flex gap-2">

            <a
                href="{{ route('admin.informasi.edit', $informasi->id) }}"
                class="btn btn-warning"
            >
                Edit
            </a>

            <a
                href="{{ route('admin.informasi.index') }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </div>

    </div>
</div>

</div>

@endsection
