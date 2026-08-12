@extends('layouts.admin')

@section('content')
    <div class="container-fluid">


        <div class="card shadow">

            <div class="card-body">


                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h4 class="fw-bold">
                        Data Berita
                    </h4>


                    <a href="{{ route('berita.create') }}" class="btn btn-primary">

                        <i class="ti ti-plus"></i>
                        Tambah Berita

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
                                    Judul
                                </th>


                                <th>
                                    Gambar
                                </th>


                                <th>
                                    Tanggal
                                </th>


                                <th width="200">
                                    Aksi
                                </th>


                            </tr>

                        </thead>



                        <tbody>


                            @forelse($berita as $item)
                                <tr>


                                    <td>
                                        {{ $loop->iteration }}
                                    </td>



                                    <td>
                                        {{ $item->judul }}
                                    </td>



                                    <td>

                                        @if ($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}" width="100" class="rounded">
                                        @else
                                            <span class="text-muted">
                                                Tidak ada gambar
                                            </span>
                                        @endif

                                    </td>



                                    <td>
                                        {{ $item->tanggal }}
                                    </td>



                                    <td>


                                        <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning btn-sm">

                                            <i class="ti ti-edit"></i>
                                            Edit

                                        </a>




                                        <form action="{{ route('berita.destroy', $item->id) }}" method="POST"
                                            class="d-inline">


                                            @csrf
                                            @method('DELETE')


                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus berita ini?')">


                                                <i class="ti ti-trash"></i>
                                                Hapus


                                            </button>


                                        </form>



                                    </td>



                                </tr>



                            @empty


                                <tr>

                                    <td colspan="5" class="text-center">

                                        Belum ada data berita

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
