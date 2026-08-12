@extends('layouts.admin')

@section('content')
    <div class="card shadow">

        <div class="card-body pt-3">

            <div class="d-flex justify-content-between align-items-center mb-2">

                <h5 class="fw-bold mb-0">
                    Data Visi & Misi
                </h5>

                <a href="{{ route('visi-misi.create') }}" class="btn btn-primary">

                    + Tambah Data

                </a>

            </div>


            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif



            <div class="table-responsive">

                <table class="table table-bordered">

                    <thead class="table-primary">

                        <tr>
                            <th width="5%">No</th>
                            <th>Visi</th>
                            <th>Misi</th>
                            <th width="20%">Aksi</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($visi as $item)
                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                <td>
                                    {{ $item->visi }}
                                </td>


                                <td>
                                    {!! nl2br($item->misi) !!}
                                </td>

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

                                <td colspan="4" class="text-center">

                                    Belum ada data

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
