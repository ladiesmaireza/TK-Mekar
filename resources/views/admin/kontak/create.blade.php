@extends('layouts.admin')

@section('content')
    <div class="container-fluid">


        <div class="card shadow">


            <div class="card-body">


                <h4 class="mb-4">
                    Tambah Kontak
                </h4>



                <form action="{{ route('kontak.store') }}" method="POST">


                    @csrf



                    <div class="mb-3">

                        <label>
                            Alamat
                        </label>


                        <textarea name="alamat" class="form-control" rows="3"></textarea>


                    </div>




                    <div class="mb-3">

                        <label>
                            Nomor Telepon
                        </label>


                        <input type="text" name="nomor_telepon" class="form-control">


                    </div>




                    <div class="mb-3">

                        <label>
                            Email
                        </label>


                        <input type="email" name="email" class="form-control">


                    </div>




                    <div class="mb-3">

                        <label>
                            Media Sosial
                        </label>


                        <input type="text" name="media_sosial" class="form-control" placeholder="Facebook / Instagram">


                    </div>




                    <button class="btn btn-success">

                        Simpan

                    </button>



                    <a href="{{ route('kontak.index') }}" class="btn btn-secondary">

                        Kembali

                    </a>



                </form>


            </div>


        </div>

    </div>
@endsection
