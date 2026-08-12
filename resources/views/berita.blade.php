@extends('layouts.app')

@section('content')

    <!-- Header -->
    <section class="py-5 text-center">
        <div class="container">
            <p class="lead fw-bold">
                Berita Kegiatan
            </p>
        </div>
    </section>

    <!-- Berita -->
    <section class="py-5">
        <div class="container">

            @if ($berita->count() > 0)
                <div class="row">

                    @foreach ($berita as $item)
                        <div class="col-md-4 mb-4">

                            <div class="card h-100 shadow border-0">

                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top"
                                        style="height:230px;object-fit:cover;">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" class="card-img-top"
                                        style="height:230px;object-fit:cover;">
                                @endif

                                <div class="card-body">

                                    <h5 class="fw-bold">
                                        {{ $item->judul }}
                                    </h5>

                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                    </small>

                                    <p class="mt-3">
                                        {{ Str::limit(strip_tags($item->isi_berita), 120) }}
                                    </p>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>
            @else
                <div class="text-center">

                    <img src="{{ asset('assets/img/empty.png') }}" width="180">

                    <h4 class="mt-4">
                        Belum ada berita
                    </h4>

                    <p class="text-muted">
                        Data berita belum tersedia.
                    </p>

                </div>
            @endif

        </div>

        </div>

        <div class="d-flex justify-content-center mt-5">

            {{ $berita->links('pagination::bootstrap-5') }}

        </div>

    </section>

@endsection
