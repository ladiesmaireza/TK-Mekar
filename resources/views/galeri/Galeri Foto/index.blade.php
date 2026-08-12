@extends('layouts.admin')

@section('content')
    <div style="margin-top: -30px;">

        <div class="card shadow">

            <div class="card-body p-3">

                <div class="d-flex justify-content-between align-items-center mb-2">

                    <h4 class="mb-0">
                        Galeri Foto
                    </h4>

                    <a href="{{ route('galeri.create') }}" class="btn btn-primary">

                        + Tambah Foto

                    </a>


                </div>



                @if (session('success'))
                    <div class="alert alert-success">

                        {{ session('success') }}

                    </div>
                @endif




                <div class="row">


                    @forelse($galeri as $item)
                        <div class="col-md-4 mb-4">


                            <div class="card shadow">


                                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top"
                                    style="height:250px;object-fit:cover;">



                                <div class="card-body">


                                    <h5>

                                        {{ $item->judul }}

                                    </h5>



                                    <p>

                                        {{ $item->keterangan }}

                                    </p>




                                    <a href="{{ route('galeri.edit', $item->id) }}" class="btn btn-warning btn-sm">

                                        Edit

                                    </a>




                                    <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" class="d-inline">


                                        @csrf

                                        @method('DELETE')


                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus foto ini?')">

                                            Hapus

                                        </button>


                                    </form>



                                </div>


                            </div>


                        </div>


                    @empty


                        <div class="col-12">

                            <div class="alert alert-info text-center">

                                Belum ada foto kegiatan

                            </div>

                        </div>
                    @endforelse


                </div>


            </div>

        </div>


    </div>
@endsection
