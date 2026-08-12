@extends('layouts.app')

@section('content')

<section class="py-5 bg-white">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Guru</h2>
        </div>

        <div class="row justify-content-center">

            @forelse($guru as $item)

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="card border-0 shadow-sm">

                    <div class="position-relative">

                        <img src="{{ asset('storage/'.$item->foto) }}"
                            class="img-fluid w-100"
                            style="height:460px; object-fit:cover;">

                        <div style="position:absolute; bottom:0; width:100%; background:rgba(90,90,90,.75); color:white; text-align:center; padding:12px;">

                            <h5 class="mb-0 fw-bold">
                                {{ $item->nama_guru }}
                            </h5>

                        </div>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">
                <div class="alert alert-info text-center">
                    Data guru belum tersedia.
                </div>
            </div>

            @endforelse

        </div>

    </div>

</section>

@endsection
