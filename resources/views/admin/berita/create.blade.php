@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-body">

                <h4 class="mb-4">
                    Tambah Berita
                </h4>


                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf


                    <div class="mb-3">

                        <label>Judul Berita</label>

                        <input type="text" name="judul" class="form-control">

                    </div>



                    <div class="mb-3">

                        <label>Isi Berita</label>

                        <textarea name="isi_berita" class="form-control" rows="6"></textarea>

                    </div>



                    <div class="mb-3">

                        <label>Tanggal</label>

                        <input type="date" name="tanggal" class="form-control">

                    </div>



                    <div class="mb-3">

                        <label>Gambar</label>

                        <input type="file" name="gambar" class="form-control">

                    </div>



                    <button class="btn btn-success">
                        Simpan
                    </button>


                    <a href="{{ route('berita.index') }}" class="btn btn-secondary">

                        Kembali

                    </a>


                </form>


            </div>

        </div>

    </div>
@endsection
