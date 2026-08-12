@extends('layouts.admin')

@section('content')
    <div class="container-fluid">


        <div class="card">


            <div class="card-body">


                <h4 class="mb-4">
                    Tambah Galeri Foto
                </h4>



                <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">


                    @csrf



                    <div class="mb-3">

                        <label class="form-label">
                            Judul Foto
                        </label>


                        <input type="text" name="judul" class="form-control" required>

                    </div>



                    <input type="hidden" name="jenis" value="foto">





                    <div class="mb-3">

                        <label class="form-label">
                            Upload Foto
                        </label>


                        <input type="file" name="gambar" class="form-control" accept="image/*" required>


                    </div>





                    <div class="mb-3">

                        <label class="form-label">
                            Keterangan
                        </label>


                        <textarea name="keterangan" class="form-control" rows="4"></textarea>


                    </div>




                    <button class="btn btn-success">

                        Simpan

                    </button>


                    <a href="{{ route('galeri.index') }}" class="btn btn-secondary">

                        Kembali

                    </a>



                </form>



            </div>

        </div>


    </div>
@endsection
