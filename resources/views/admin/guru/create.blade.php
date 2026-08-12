@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-body">


                <h4>
                    Tambah Guru
                </h4>



                <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">


                    @csrf


                    <div class="mb-3">

                        <label>
                            Nama Guru
                        </label>

                        <input type="text" name="nama_guru" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>
                            Foto
                        </label>

                        <input type="file" name="foto" class="form-control">

                    </div>



                    <button class="btn btn-success">

                        Simpan

                    </button>


                </form>


            </div>

        </div>

    </div>
@endsection
