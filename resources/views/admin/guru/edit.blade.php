@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-body">


                <h4>
                    Edit Guru
                </h4>


                <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">


                    @csrf

                    @method('PUT')



                    <div class="mb-3">

                        <label>
                            Nama Guru
                        </label>


                        <input type="text" name="nama_guru" class="form-control" value="{{ $guru->nama_guru }}">


                    </div>



                    <div class="mb-3">

                        <label>
                            NIP
                        </label>


                        <input type="text" name="nip" class="form-control" value="{{ $guru->nip }}">


                    </div>



                    <div class="mb-3">

                        <label>
                            Jabatan
                        </label>


                        <input type="text" name="jabatan" class="form-control" value="{{ $guru->jabatan }}">


                    </div>



                    <div class="mb-3">

                        <label>
                            Pendidikan
                        </label>


                        <input type="text" name="pendidikan" class="form-control" value="{{ $guru->pendidikan }}">


                    </div>



                    <div class="mb-3">

                        <label>
                            Foto Baru
                        </label>


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
