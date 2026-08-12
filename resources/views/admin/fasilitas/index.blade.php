@extends('layouts.admin')

@section('content')

<div class="card shadow mt-0">

    <div class="card-body pt-3">

        <div class="d-flex justify-content-between align-items-center mb-2">

            <h4 class="mb-0">Data Fasilitas</h4>

                    <a href="{{ route('fasilitas.create') }}" class="btn btn-primary">
                        Tambah Fasilitas
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered table-striped">

                    <thead class="table-primary">
                        <tr>
                            <th width="60">No</th>
                            <th>Nama Fasilitas</th>
                            <th width="120">Foto</th>
                            <th>Deskripsi</th>
                            <th width="170">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($fasilitas as $item)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->nama_fasilitas }}</td>

                                <td class="text-center">
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" width="100"
                                            class="img-thumbnail">
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>{{ $item->deskripsi }}</td>

                                <td>
                                    <div class="d-flex align-items-center gap-2 flex-nowrap">

                                        <a href="{{ route('ppdb.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                            <i class="ti ti-edit me-1"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('ppdb.destroy', $item->id) }}" method="POST" class="m-0">

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
                                <td colspan="5" class="text-center">
                                    Belum ada data fasilitas.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>

    </div>
@endsection
