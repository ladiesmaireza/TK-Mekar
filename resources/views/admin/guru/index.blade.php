@extends('layouts.admin')

@section('content')

<div class="card shadow mt-0">

    <div class="card-header d-flex justify-content-between align-items-center py-2">

        <h4 class="mb-0">Data Guru</h4>

                <a href="{{ route('guru.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Guru
                </a>
            </div>

            <div class="card-body">

                {{-- Pesan sukses --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="table-responsive">

                    <table class="table table-bordered table-striped align-middle">

                        <thead class="table-primary text-center">
                            <tr>
                                <th width="60">No</th>
                                <th>Nama Guru</th>
                                <th width="120">Foto</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($guru as $item)
                                <tr>

                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $item->nama_guru }}
                                    </td>

                                    <td class="text-center">

                                        @if ($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" width="80"
                                                class="img-thumbnail">
                                        @else
                                            <span class="text-muted">Tidak ada foto</span>
                                        @endif

                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center gap-2 flex-nowrap">

                                            <a href="{{ route('ppdb.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                                <i class="ti ti-edit me-1"></i>
                                                Edit
                                            </a>

                                            <form action="{{ route('ppdb.destroy', $item->id) }}" method="POST"
                                                class="m-0">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data PPDB ini?')">

                                                    <i class="ti ti-trash me-1"></i>
                                                    Hapus

                                                </button>

                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="4" class="text-center">
                                        Belum ada data guru.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
@endsection
