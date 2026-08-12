@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-body">


                <h4>
                    Edit Visi & Misi
                </h4>


                <form action="{{ route('visi-misi.update', $visi->id) }}" method="POST">

                    @csrf

                    @method('PUT')


                    <div class="mb-3">

                        <label>
                            Visi
                        </label>


                        <textarea name="visi" class="form-control" rows="4">{{ $visi->visi }}</textarea>


                    </div>



                    <div class="mb-3">

                        <label>
                            Misi
                        </label>


                        <textarea name="misi" class="form-control" rows="6">{{ $visi->misi }}</textarea>


                    </div>



                    <button class="btn btn-primary">

                        Update

                    </button>


                </form>


            </div>

        </div>

    </div>
@endsection
