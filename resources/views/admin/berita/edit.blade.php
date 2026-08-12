@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-body">


                <h4>
                    Edit Berita
                </h4>


                <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">


                    @csrf
                    @method('PUT')


                    <div class="mb-3">

                        <label>Judul</label>

                        <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}">

                    </div>


                    <div class="mb-3">

                        <label>Isi Berita</label>

                        <textarea name="isi_berita" class="form-control" rows="6">{{ $berita->isi_berita }}</textarea>

                    </div>


                    <div class="mb-3">

                        <label>Tanggal</label>

                        <input type="date" name="tanggal" class="form-control" value="{{ $berita->tanggal }}">

                    </div>


                    <div class="mb-3">

                        <label>Ganti Gambar</label>

                        <input type="file" name="gambar" class="form-control">

                    </div>


                    <button class="btn btn-primary">
                        Update
                    </button>


                </form>


            </div>

        </div>

    </div>
@endsection
