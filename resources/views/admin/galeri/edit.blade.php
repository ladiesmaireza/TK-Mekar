@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-body">


                <h4>
                    Edit Galeri
                </h4>


                <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">


                    @csrf
                    @method('PUT')


                    <div class="mb-3">

                        <label>
                            Judul
                        </label>

                        <input type="text" name="judul" class="form-control" value="{{ $galeri->judul }}">

                    </div>


                    <div class="mb-3">

                        <label>
                            Jenis
                        </label>

                        <select name="jenis" class="form-control">


                            <option value="foto" @if ($galeri->jenis == 'foto') selected @endif>
                                Foto
                            </option>


                            <option value="video" @if ($galeri->jenis == 'video') selected @endif>
                                Video
                            </option>


                        </select>

                    </div>


                    <div class="mb-3">

                        <label>
                            Ganti Gambar
                        </label>

                        <input type="file" name="gambar" class="form-control">


                    </div>


                    <div class="mb-3">

                        <label>
                            Keterangan
                        </label>

                        <textarea name="keterangan" class="form-control">{{ $galeri->keterangan }}</textarea>

                    </div>


                    <button class="btn btn-primary">

                        Update

                    </button>


                </form>


            </div>

        </div>

    </div>
@endsection
