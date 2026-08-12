@extends('layouts.admin')

@section('content')
    <div class="container-fluid">


        <div class="card shadow">

            <div class="card-body">


                <h4 class="mb-4">
                    Tambah Visi & Misi
                </h4>


                <form action="{{ route('visi-misi.store') }}" method="POST">

                    @csrf


                    <div class="mb-3">

                        <label>
                            Visi
                        </label>

                        <textarea name="visi" class="form-control" rows="4" required></textarea>

                    </div>



                    <div class="mb-3">

                        <label>
                            Misi
                        </label>

                        <textarea name="misi" class="form-control" rows="6" required></textarea>

                    </div>



                    <button class="btn btn-success">

                        Simpan

                    </button>


                    <a href="{{ route('visi-misi.index') }}" class="btn btn-secondary">

                        Kembali

                    </a>


                </form>


            </div>

        </div>


    </div>
@endsection
