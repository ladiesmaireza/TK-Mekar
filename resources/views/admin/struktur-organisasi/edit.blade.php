@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-body">


                <h4>
                    Edit Struktur Organisasi
                </h4>


                <form action="{{ route('struktur-organisasi.update', $struktur->id) }}" method="POST"
                    enctype="multipart/form-data">


                    @csrf
                    @method('PUT')


                    <div class="mb-3">

                        <label>Nama</label>

                        <input type="text" name="nama" class="form-control" value="{{ $struktur->nama }}">

                    </div>


                    <div class="mb-3">

                        <label>Jabatan</label>

                        <input type="text" name="jabatan" class="form-control" value="{{ $struktur->jabatan }}">

                    </div>


                    <div class="mb-3">

                        <label>Ganti Foto</label>

                        <input type="file" name="foto" class="form-control">

                    </div>


                    <button class="btn btn-primary">

                        Update

                    </button>


                </form>


            </div>

        </div>

    </div>
@endsection
