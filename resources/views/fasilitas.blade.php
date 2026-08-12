@extends('layouts.app')

@section('content')

<div class="py-5 bg-light">

    <div class="container">

        <!-- Judul -->
        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Fasilitas Unggulan
            </h2>

            <p class="text-muted">
                Berikut adalah fasilitas yang kami sediakan untuk mendukung siswa belajar dengan nyaman.
            </p>

        </div>

        <div class="row">

            @forelse($fasilitas as $item)

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="card border-0 shadow rounded-4 h-100">

                    <img
                        src="{{ asset('storage/'.$item->gambar) }}"
                        class="card-img-top"
                        style="
                            height:230px;
                            object-fit:cover;
                        ">

                    <div class="card-body text-center">

                        <h4 class="fw-bold">

                            {{ $item->nama_fasilitas }}

                        </h4>

                        <p class="text-muted mb-0">

                            {{ $item->deskripsi }}

                        </p>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">

                <div class="alert alert-info text-center">

                    Data fasilitas belum tersedia.

                </div>

            </div>

            @endforelse

        </div>

    </div>

</div>

@endsection
