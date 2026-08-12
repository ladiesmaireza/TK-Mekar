@extends('layouts.admin')

@section('content')
    <div class="container-fluid">


        <div class="card">


            <div class="card-body">


                <h4 class="mb-4">
                    Edit Galeri Foto
                </h4>



                <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">


                    @csrf

                    @method('PUT')



                    <div class="mb-3">

                        <label>
                            Judul Foto
                        </label>


                        <input type="text" name="judul" class="form-control" value="{{ $galeri->judul }}" required>


                    </div>



                    <input type="hidden" name="jenis" value="foto">




                    <div class="mb-3">


                        <label>
                            Foto Saat Ini
                        </label>


                        <br>


                        @if ($galeri->gambar)
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" width="200" class="rounded">
                        @endif


                    </div>





                    <div class="mb-3">


                        <label>
                            Ganti Foto (Opsional)
                        </label>


                        <input type="file" name="gambar" class="form-control" accept="image/*">


                    </div>





                    <div class="mb-3">

                        <label>
                            Keterangan
                        </label>


                        <textarea name="keterangan" class="form-control" rows="4">{{ $galeri->keterangan }}</textarea>


                    </div>




                    <button class="btn btn-success">

                        Update

                    </button>


                    <a href="{{ route('galeri.index') }}" class="btn btn-secondary">

                        Kembali

                    </a>



                </form>



            </div>

        </div>


    </div>
@endsection
