@extends('layouts.admin')

@section('content')
    <div class="container-fluid">


        <div class="card shadow">

            <div class="card-body">


                <h4>
                    Tambah Profil Sekolah
                </h4>



                <form action="{{ route('profil.store') }}" method="POST">


                    @csrf



                    <div class="mb-3">

                        <label>
                            Judul
                        </label>


                        <input type="text" name="judul" class="form-control">

                    </div>



                    <div class="mb-3">

                        <label>
                            Isi Profil
                        </label>


                        <textarea name="isi" rows="6" class="form-control"></textarea>


                    </div>



                    <button class="btn btn-success">

                        Simpan

                    </button>


                </form>


            </div>

        </div>


    </div>
@endsection
