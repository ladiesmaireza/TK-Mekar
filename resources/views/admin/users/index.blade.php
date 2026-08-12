@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')

@section('content') <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-0">Manajemen Pengguna</h4>
            <p class="text-muted mb-0">
                Kelola dan pantau seluruh akun pengguna sistem. </p>
        </div>

        <a href="{{ route('users.create') }}" class="btn btn-success">
            <i class="ti ti-user-plus me-1"></i>
            Tambah Pengguna
        </a>
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

    {{-- Pesan error --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th width="70">ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th width="140">Role</th>
                            <th width="140">Dibuat</th>
                            <th width="180" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($users as $user)

                            <tr>

                                {{-- ID --}}
                                <td>
                                    <strong>{{ $user->id }}</strong>
                                </td>

                                {{-- Nama --}}
                                <td>
                                    <div class="fw-semibold">
                                        {{ $user->name }}
                                    </div>
                                </td>

                                {{-- Email --}}
                                <td>
                                    {{ $user->email }}
                                </td>

                                {{-- Role --}}
                                <td>

                                    @if ($user->role === 'super_admin')
                                        <span class="badge bg-danger">
                                            Super Admin
                                        </span>
                                    @elseif ($user->role === 'admin')
                                        <span class="badge bg-primary">
                                            Admin
                                        </span>
                                    @elseif ($user->role === 'user')
                                        <span class="badge bg-secondary">
                                            User
                                        </span>
                                    @else
                                        <span class="badge bg-dark">
                                            {{ ucfirst(str_replace('_', ' ', $user->role)) }}
                                        </span>
                                    @endif

                                </td>

                                {{-- Tanggal --}}
                                <td>
                                    {{ $user->created_at->format('d M Y') }}
                                </td>

                                {{-- Aksi --}}
                                <td class="text-center">

                                    @if (in_array($user->role, ['admin', 'super_admin']))
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-primary">
                                            Edit
                                        </a>

                                        @if ($user->id !== auth()->id())
                                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                                class="d-inline">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna {{ $user->name }}?')">
                                                    Hapus
                                                </button>

                                            </form>
                                        @else
                                            <span class="badge bg-light text-dark">
                                                Akun Anda
                                            </span>
                                        @endif
                                    @else
                                        <span class="text-muted">
                                            -
                                        </span>
                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <div class="text-muted">
                                        Belum ada data pengguna.
                                    </div>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>
    </div>

@endsection
