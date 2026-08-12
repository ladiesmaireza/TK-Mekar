@extends('layouts.app')

@section('content')

    <section class="py-5" style="background:#f8f9fa;">

        <div class="container">

            {{-- JUDUL --}}
            <div class="text-center mb-5">

                <h1 class="fw-bold text-success" style="font-size:40px;">
                    Sejarah Sekolah
                </h1>

                <p class="text-muted fs-5 mb-0">
                    TK Mekar Tigo Jangko
                </p>

            </div>


            {{-- DATA PROFIL --}}
            @if ($profil)
                <div class="row justify-content-center">

                    <div class="col-lg-10">

                        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">


                            {{-- FOTO SEJARAH --}}
                            @if ($profil->foto_sejarah)
                                <img src="{{ asset('storage/' . $profil->foto_sejarah) }}"
                                    alt="Foto Sejarah TK Mekar Tigo Jangko" class="img-fluid w-100"
                                    style="
                                height:420px;
                                object-fit:cover;
                            ">
                            @else
                                {{-- FOTO DEFAULT JIKA FOTO BELUM DIUPLOAD --}}
                                <img src="{{ asset('assets/img/tk.jpeg') }}" alt="TK Mekar Tigo Jangko"
                                    class="img-fluid w-100"
                                    style="
                                height:420px;
                                object-fit:cover;
                            ">
                            @endif


                            {{-- ISI SEJARAH --}}
                            <div class="card-body p-5">

                                <h3 class="fw-bold text-success mb-4">
                                    Sejarah TK Mekar Tigo Jangko
                                </h3>


                                @if ($profil->sejarah)
                                    <div
                                        style="
                                    text-align:justify;
                                    line-height:35px;
                                    font-size:18px;
                                    color:#444;
                                    white-space:pre-line;
                                ">
                                        {{ $profil->sejarah }}
                                    </div>
                                @else
                                    <div class="alert alert-info">
                                        Sejarah sekolah belum tersedia.
                                    </div>
                                @endif

                            </div>

                        </div>

                    </div>

                </div>
            @else
                {{-- JIKA DATA PROFIL BELUM ADA --}}
                <div class="row justify-content-center">

                    <div class="col-lg-10">

                        <div class="alert alert-warning text-center">

                            Data profil sekolah belum tersedia.

                        </div>

                    </div>

                </div>
            @endif

        </div>


    </section>

@endsection
