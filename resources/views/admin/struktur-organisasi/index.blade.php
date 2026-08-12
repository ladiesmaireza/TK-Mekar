@extends('layouts.admin')

@section('content')
    <div class="card shadow mt-0">

        <div class="card-body pt-3">

            <div class="d-flex justify-content-between align-items-center mb-2">

                <h4 class="fw-bold mb-0">
                    Data Struktur Organisasi
                </h4>

                <a href="{{ route('struktur-organisasi.create') }}" class="btn btn-primary">

                    <i class="ti ti-plus"></i>
                    Tambah Struktur

                </a>


            </div>



            @if (session('success'))
                <div class="alert alert-success">

                    {{ session('success') }}

                </div>
            @endif




            <div class="table-responsive">


                <table class="table table-bordered table-striped">


                    <thead class="table-primary">

                        <tr>

                            <th width="50">
                                No
                            </th>

                            <th>
                                Foto
                            </th>

                            <th>
                                Nama
                            </th>

                            <th>
                                Jabatan
                            </th>

                            <th width="200">
                                Aksi
                            </th>

                        </tr>

                    </thead>



                    <tbody>


                        @forelse($struktur as $item)
                            <tr>


                                <td>
                                    {{ $loop->iteration }}
                                </td>



                                <td>


                                    @if ($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" width="80" height="80"
                                            class="rounded-circle" style="object-fit:cover;">
                                    @else
                                        <span class="text-muted">
                                            Tidak ada foto
                                        </span>
                                    @endif


                                </td>




                                <td>

                                    {{ $item->nama }}

                                </td>




                                <td>

                                    {{ $item->jabatan }}

                                </td>




                                <td>


                                    <a href="{{ route('struktur-organisasi.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm">


                                        <i class="ti ti-edit"></i>

                                        Edit


                                    </a>





                                    <form action="{{ route('struktur-organisasi.destroy', $item->id) }}" method="POST"
                                        class="d-inline">


                                        @csrf

                                        @method('DELETE')


                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus data ini?')">


                                            <i class="ti ti-trash"></i>

                                            Hapus


                                        </button>


                                    </form>



                                </td>



                            </tr>



                        @empty


                            <tr>

                                <td colspan="5" class="text-center">

                                    Belum ada data struktur organisasi

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
