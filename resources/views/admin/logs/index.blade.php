@extends('layouts.admin')

@section('title', 'Log Aktivitas')

@section('content')

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Log Aktivitas</h4>
            <p class="text-muted mb-0">
                Rekam dan pantau seluruh aktivitas pengguna dalam sistem.
            </p>
        </div>
    </div>

    {{-- Informasi --}}
    <div class="alert alert-info border-0 shadow-sm mb-4">
        <div class="d-flex align-items-center">
            <i class="ti ti-info-circle fs-5 me-2"></i>
            <div>
                <strong>Audit Trail</strong>
                <div class="small">
                    Halaman ini digunakan untuk memantau aktivitas pengguna
                    seperti login, logout, penambahan, perubahan, dan penghapusan data.
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Log --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">Riwayat Aktivitas</h5>
                    <small class="text-muted">
                        Aktivitas terbaru ditampilkan terlebih dahulu.
                    </small>
                </div>

                @if ($logs->total() > 0)
                    <span class="badge bg-primary">
                        {{ $logs->total() }} Aktivitas
                    </span>
                @endif

            </div>
        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th class="px-4">#</th>
                            <th>Waktu</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Aksi</th>
                            <th>IP Address</th>
                            <th>User Agent</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($logs as $log)
                            <tr>

                                {{-- ID --}}
                                <td class="px-4 fw-semibold">
                                    {{ $log->id }}
                                </td>

                                {{-- Waktu --}}
                                <td>
                                    <div class="fw-semibold">
                                        {{ $log->created_at->format('d M Y') }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $log->created_at->format('H:i:s') }}
                                    </small>
                                </td>

                                {{-- User --}}
                                <td>
                                    <div class="fw-semibold">
                                        {{ $log->user?->name ?? 'Guest' }}
                                    </div>

                                    @if ($log->user?->email)
                                        <small class="text-muted">
                                            {{ $log->user->email }}
                                        </small>
                                    @endif
                                </td>

                                {{-- Role --}}
                                <td>

                                    @php
                                        $role = $log->user?->role;
                                    @endphp

                                    @if ($role === 'super_admin')
                                        <span class="badge bg-danger">
                                            Super Admin
                                        </span>
                                    @elseif ($role === 'admin')
                                        <span class="badge bg-primary">
                                            Admin
                                        </span>
                                    @elseif ($role === 'user')
                                        <span class="badge bg-success">
                                            Pengguna
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            -
                                        </span>
                                    @endif

                                </td>

                                {{-- Aksi --}}
                                <td>
                                    <span class="text-dark">
                                        {{ $log->action }}
                                    </span>
                                </td>

                                {{-- IP --}}
                                <td>
                                    <code>
                                        {{ $log->ip_address ?? '-' }}
                                    </code>
                                </td>

                                {{-- User Agent --}}
                                <td style="min-width: 250px; max-width: 350px;">

                                    @if ($log->user_agent)
                                        <span class="text-muted" title="{{ $log->user_agent }}">
                                            {{ \Illuminate\Support\Str::limit($log->user_agent, 55) }}
                                        </span>
                                    @else
                                        <span class="text-muted">
                                            -
                                        </span>
                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center py-5">

                                    <div class="text-muted">

                                        <i class="ti ti-history fs-1 d-block mb-2"></i>

                                        <h6>Belum Ada Aktivitas</h6>

                                        <p class="mb-0 small">
                                            Belum terdapat aktivitas pengguna
                                            yang tercatat dalam sistem.
                                        </p>

                                    </div>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- Pagination --}}
        @if ($logs->hasPages())
            <div class="card-footer bg-white">

                <div class="d-flex justify-content-between align-items-center">

                    <small class="text-muted">
                        Menampilkan
                        {{ $logs->firstItem() }}
                        -
                        {{ $logs->lastItem() }}
                        dari
                        {{ $logs->total() }}
                        aktivitas
                    </small>

                    <div>
                        {{ $logs->links() }}
                    </div>

                </div>

            </div>
        @endif

    </div>

@endsection
