@extends('layouts.admin')

@section('title', 'Papan Informasi')

@section('content')

<style>
    .informasi-header {
        margin-bottom: 24px;
    }

    .informasi-header h3 {
        color: #17365d;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .informasi-header p {
        font-size: 13px;
        color: #94a3b8;
    }

    .informasi-card {
        overflow: hidden;
    }

    .informasi-table {
        width: 100%;
        table-layout: fixed;
        margin-bottom: 0;
    }

    .informasi-table thead th {
        background: #f8fafc;
        color: #64748b;
        border-bottom: 1px solid #e8edf5;
        padding: 14px 12px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .3px;
        white-space: nowrap;
    }

    .informasi-table tbody td {
        padding: 15px 12px;
        color: #475569;
        border-bottom: 1px solid #eef2f7;
        vertical-align: middle;
        font-size: 12px;
    }

    .informasi-table tbody tr:last-child td {
        border-bottom: none;
    }

    .informasi-table tbody tr {
        transition: background-color .2s ease;
    }

    .informasi-table tbody tr:hover {
        background: #f8fbff;
    }

    .kolom-no {
        width: 55px;
        text-align: center;
    }

    .kolom-judul {
        width: 22%;
    }

    .kolom-isi {
        width: 36%;
    }

    .kolom-penerima {
        width: 16%;
    }

    .kolom-tanggal {
        width: 14%;
    }

    .kolom-aksi {
        width: 120px;
        text-align: center;
    }

    .nomor-data {
        width: 28px;
        height: 28px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: #eff6ff;
        color: #2563eb;
        font-weight: 700;
        font-size: 11px;
    }

    .judul-informasi {
        display: block;
        color: #1e293b;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.5;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .isi-informasi {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
        color: #64748b;
        line-height: 1.6;
        max-height: 38px;
    }

    .badge-penerima {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 9px;
        border-radius: 8px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
    }

    .tanggal-informasi {
        color: #64748b;
        font-size: 11px;
        line-height: 1.5;
        white-space: nowrap;
    }

    .aksi-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .aksi-btn {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        border-radius: 8px;
        border: none;
    }

    .btn-lihat {
        background: #eff6ff;
        color: #2563eb;
    }

    .btn-lihat:hover {
        background: #2563eb;
        color: #ffffff;
    }

    .btn-edit {
        background: #fff7ed;
        color: #ea580c;
    }

    .btn-edit:hover {
        background: #ea580c;
        color: #ffffff;
    }

    .btn-hapus {
        background: #fef2f2;
        color: #dc2626;
    }

    .btn-hapus:hover {
        background: #dc2626;
        color: #ffffff;
    }

    .empty-state {
        padding: 60px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 65px;
        height: 65px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
        border-radius: 18px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 30px;
    }

    .empty-state h5 {
        color: #1e293b;
        font-weight: 700;
    }

    .empty-state p {
        color: #94a3b8;
        font-size: 13px;
    }

    @media (max-width: 992px) {

        .informasi-table {
            min-width: 900px;
        }

        .informasi-card .card-body {
            overflow-x: auto;
        }
    }

    @media (max-width: 576px) {

        .informasi-header {
            display: block !important;
        }

        .informasi-header .btn {
            margin-top: 15px;
        }
    }
</style>

<div class="container-fluid">

    <div class="informasi-header d-flex justify-content-between align-items-center">

        <div>
            <h3>Papan Informasi</h3>

            <p class="mb-0">
                Kelola informasi yang akan disampaikan kepada orang tua.
            </p>
        </div>

        <a href="{{ route('admin.informasi.create') }}"
           class="btn btn-primary">

            <i class="ti ti-plus me-1"></i>

            Kirim Informasi

        </a>

    </div>


    <div class="card informasi-card">

        <div class="card-body p-0">

            @if ($informasi->count() > 0)

                <div class="table-responsive">

                    <table class="table informasi-table">

                        <thead>

                            <tr>

                                <th class="kolom-no">
                                    No
                                </th>

                                <th class="kolom-judul">
                                    Judul Informasi
                                </th>

                                <th class="kolom-isi">
                                    Isi Informasi
                                </th>

                                <th class="kolom-penerima">
                                    Penerima
                                </th>

                                <th class="kolom-tanggal">
                                    Tanggal
                                </th>

                                <th class="kolom-aksi">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($informasi as $item)

                                <tr>

                                    <td class="kolom-no">

                                        <span class="nomor-data">
                                            {{ $loop->iteration }}
                                        </span>

                                    </td>

                                    <td>

                                        <span class="judul-informasi"
                                              title="{{ $item->judul }}">

                                            {{ $item->judul }}

                                        </span>

                                    </td>

                                    <td>

                                        <div class="isi-informasi"
                                             title="{{ $item->isi }}">

                                            {{ $item->isi }}

                                        </div>

                                    </td>

                                    <td>

                                        <span class="badge-penerima">

                                            <i class="ti ti-users"></i>

                                            Semua Orang Tua

                                        </span>

                                    </td>

                                    <td>

                                        <div class="tanggal-informasi">

                                            {{ $item->created_at
                                                ? $item->created_at->format('d M Y')
                                                : '-' }}

                                            @if ($item->created_at)
                                                <br>
                                                <span class="text-muted">
                                                    {{ $item->created_at->format('H:i') }}
                                                </span>
                                            @endif

                                        </div>

                                    </td>

                                    <td>

                                        <div class="aksi-wrapper">

                                            <a href="{{ route('admin.informasi.show', $item->id) }}"
                                               class="btn aksi-btn btn-lihat"
                                               title="Lihat Informasi">

                                                <i class="ti ti-eye"></i>

                                            </a>

                                            <a href="{{ route('admin.informasi.edit', $item->id) }}"
                                               class="btn aksi-btn btn-edit"
                                               title="Edit Informasi">

                                                <i class="ti ti-edit"></i>

                                            </a>

                                            <form action="{{ route('admin.informasi.destroy', $item->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus informasi ini?');">

                                                @csrf

                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn aksi-btn btn-hapus"
                                                        title="Hapus Informasi">

                                                    <i class="ti ti-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty-state">

                    <div class="empty-icon">

                        <i class="ti ti-info-circle"></i>

                    </div>

                    <h5>
                        Belum Ada Informasi Sekolah
                    </h5>

                    <p>
                        Silakan buat informasi pertama untuk orang tua.
                    </p>

                    <a href="{{ route('admin.informasi.create') }}"
                       class="btn btn-primary">

                        <i class="ti ti-plus me-1"></i>

                        Buat Informasi

                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection
