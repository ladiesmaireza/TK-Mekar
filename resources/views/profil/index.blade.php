@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h4 class="fw-bold mb-1">
                            Profil Sekolah
                        </h4>

                        <p class="text-muted mb-0">
                            Kelola informasi profil TK Mekar Tigo Jangko
                        </p>
                    </div>

                    @if ($profil)
                        <a href="{{ route('profil.edit', $profil->id) }}" class="btn btn-warning">

                            <i class="ti ti-edit me-1"></i>
                            Edit Profil

                        </a>
                    @endif

                </div>


                {{-- Pesan berhasil --}}

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                {{-- Jika data profil tersedia --}}

                @if ($profil)
                    <div class="table-responsive">

                        <table class="table table-bordered align-middle">

                            <tbody>

                                <tr>
                                    <th width="220">
                                        Nama Sekolah
                                    </th>

                                    <td>
                                        {{ $profil->nama_sekolah }}
                                    </td>
                                </tr>


                                <tr>
                                    <th>
                                        Alamat
                                    </th>

                                    <td>
                                        {{ $profil->alamat }}
                                    </td>
                                </tr>


                                <tr>
                                    <th>
                                        Telepon
                                    </th>

                                    <td>
                                        {{ $profil->telepon }}
                                    </td>
                                </tr>


                                <tr>
                                    <th>
                                        Email
                                    </th>

                                    <td>
                                        {{ $profil->email }}
                                    </td>
                                </tr>


                                <tr>
                                    <th>
                                        Sejarah Sekolah
                                    </th>

                                    <td>
                                        {{ $profil->sejarah }}
                                    </td>
                                </tr>


                                <tr>
                                    <th>
                                        Foto Kepala Sekolah
                                    </th>

                                    <td>

                                        @if ($profil->foto_kepala_sekolah)
                                            <img src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}"
                                                alt="Foto Kepala Sekolah" width="120" height="120" class="rounded-3"
                                                style="object-fit: cover;">
                                        @else
                                            <span class="text-muted">
                                                Foto belum tersedia
                                            </span>
                                        @endif

                                    </td>
                                </tr>


                                <tr>
                                    <th>
                                        Sambutan Kepala Sekolah
                                    </th>

                                    <td>

                                        @if ($profil->sambutan_kepala_sekolah)
                                            <div style="white-space: pre-line;">
                                                {{ $profil->sambutan_kepala_sekolah }}
                                            </div>
                                        @else
                                            <span class="text-muted">
                                                Sambutan belum tersedia
                                            </span>
                                        @endif

                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>
                @else
                    {{-- Jika data belum ada --}}

                    <div class="alert alert-warning">

                        Data profil sekolah belum tersedia.

                        <a href="{{ route('profil.create') }}" class="btn btn-primary btn-sm ms-2">

                            Tambah Profil

                        </a>

                    </div>
                @endif

            </div>

        </div>

    </div>

@endsection
