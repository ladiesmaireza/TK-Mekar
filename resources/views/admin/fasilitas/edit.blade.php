@extends('layouts.admin')

@section('content')
    <div class="container-fluid">


        <div class="card shadow">

            <div class="card-body">


                <h4 class="fw-bold mb-4">
                    Edit Fasilitas
                </h4>



                <form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data">


                    @csrf

                    @method('PUT')



                    <div class="mb-3">

                        <label class="form-label">
                            Nama Fasilitas
                        </label>


                        <input type="text" name="nama" class="form-control" value="{{ $fasilitas->nama }}">


                    </div>




                    <div class="mb-3">

                        <label class="form-label">
                            Foto Saat Ini
                        </label>

                        <br>


                        @if ($fasilitas->foto)
                            <img src="{{ asset('storage/' . $fasilitas->foto) }}" width="120" class="mb-3 rounded">
                        @else
                            <p>
                                Belum ada foto
                            </p>
                        @endif


                    </div>




                    <div class="mb-3">

                        <label class="form-label">
                            Ganti Foto
                        </label>


                        <input type="file" name="foto" class="form-control">


                    </div>




                    <div class="mb-3">

                        <label class="form-label">
                            Keterangan
                        </label>


                        <textarea name="keterangan" class="form-control" rows="5">{{ $fasilitas->keterangan }}</textarea>


                    </div>




                    <button type="submit" class="btn btn-primary">

                        Update

                    </button>



                    <a href="{{ route('fasilitas.index') }}" class="btn btn-secondary">

                        Kembali

                    </a>



                </form>


            </div>

        </div>

    </div>
@endsection
