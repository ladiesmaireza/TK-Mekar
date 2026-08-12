@extends('layouts.admin')

@section('content')

    <div class="container-fluid">


        <div class="card shadow">


            <div class="card-body">


                <h3 class="mb-4">
                    Halaman Data Foto Kegiatan
                </h3>



                <div class="card">


                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5 class="mb-0">
                            Data Foto Kegiatan
                        </h5>


                        <a href="{{ route('galeri.create') }}" class="btn btn-success">

                            Tambah Foto Baru

                        </a>


                    </div>



                    <div class="card-body">


                        <div class="table-responsive">


                            <table class="table table-bordered">


                                <thead>

                                    <tr>

                                        <th width="80">
                                            ID
                                        </th>


                                        <th>
                                            Nama Gambar
                                        </th>


                                        <th width="200">
                                            Preview
                                        </th>


                                        <th width="150">
                                            Aksi
                                        </th>


                                    </tr>

                                </thead>



                                <tbody>


                                    @forelse($galeri as $item)
                                        @if ($item->jenis == 'foto')
                                            <tr>


                                                <td>
                                                    {{ $item->id }}
                                                </td>



                                                <td>

                                                    {{ $item->judul }}

                                                </td>



                                                <td>


                                                    @if ($item->gambar)
                                                        <img src="{{ asset('storage/' . $item->gambar) }}" width="120"
                                                            class="img-thumbnail">
                                                    @else
                                                        Tidak ada foto
                                                    @endif


                                                </td>



                                                <td>


                                                    <form action="{{ route('galeri.destroy', $item->id) }}" method="POST">


                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data PPDB ini?')">

                                                            <i class="ti ti-trash me-1"></i>
                                                            Hapus

                                                        </button>

                                                    </form>


                                                </td>


                                            </tr>
                                        @endif



                                    @empty


                                        <tr>

                                            <td colspan="4" class="text-center">

                                                Belum ada data foto kegiatan

                                            </td>

                                        </tr>
                                    @endforelse



                                </tbody>


                            </table>


                        </div>


                    </div>


                </div>



            </div>


        </div>


    </div>


@endsection
