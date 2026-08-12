@extends('layouts.app')

@section('content')
    <div class="container mt-5">


        <h2 class="text-center fw-bold mb-5">
            Galeri Foto Kegiatan
        </h2>


        <div class="row g-4">


            @forelse($galeri as $item)
                <div class="col-lg-4 col-md-6">


                    <div class="gallery-card">


                        <img src="{{ asset('storage/' . $item->gambar) }}" class="gallery-img" data-bs-toggle="modal"
                            data-bs-target="#foto{{ $item->id }}">


                    </div>


                </div>


                {{-- MODAL FOTO --}}

                <div class="modal fade" id="foto{{ $item->id }}" tabindex="-1">


                    <div class="modal-dialog modal-lg modal-dialog-centered">


                        <div class="modal-content bg-transparent border-0">


                            <div class="modal-body text-center">


                                <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid rounded shadow">


                            </div>


                        </div>


                    </div>


                </div>


            @empty


                <div class="alert alert-info text-center">
                    Belum ada foto kegiatan.
                </div>
            @endforelse


        </div>



        <div class="d-flex justify-content-center mt-5">

            {{ $galeri->links('pagination::bootstrap-5') }}

        </div>


    </div>
@endsection



@push('styles')
    <style>
        .gallery-card {

            overflow: hidden;

            border-radius: 15px;

            box-shadow: 0 5px 15px rgba(0, 0, 0, .15);

        }



        .gallery-img {

            width: 100%;

            height: 260px;

            object-fit: cover;

            cursor: pointer;

            transition: .4s;

        }



        .gallery-img:hover {

            transform: scale(1.1);

        }



        .modal-body img {

            max-height: 85vh;

        }
    </style>
@endpush
