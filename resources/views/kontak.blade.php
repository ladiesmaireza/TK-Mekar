@extends('layouts.app')

@section('title', 'Kontak TK Mekar Tigo Jangko')

@section('content')
<div class="container py-4" style="margin-top:40px">

    <h2 class="text-center mb-4">
        Kontak Kami
    </h2>

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-body">
                    <div class="text-center mb-6" style="margin-bottom: 80px;">

                        <div class="mb-4">
                            <h5>
                                <i class="fas fa-map-marker-alt text-success"></i>
                            </h5>
                            <p>
                                Jorong Rajawali. Nagari Tigo Jangko, Kecamatan Lintau Buo, Kabupaten Tanah Datar
                            </p>
                        </div>

                        <div class="mb-4">
                            <h5>
                                <i class="fas fa-phone text-success"></i>
                            </h5>
                            <p>+62 823 7149 6967</p>
                        </div>

                        <div class="mb-4">
                            <h5>
                                <i class="fas fa-globe text-success"></i>
                            </h5>
                            <p>
                                <a href="http://127.0.0.1:8000" target="_blank" class="text-decoration-none">
                                    www.tkmekartigojangko.com
                                </a>
                            </p>
                        </div>

                        <div class="mb-4">
                            <a href="https://www.facebook.com/profile.php?id=100069831382917&locale=id_ID"
                                target="_blank" class="text-decoration-none text-dark">

                                <h5>
                                    <i class="fab fa-facebook text-primary"></i>
                                </h5>

                                <p>Facebook</p>

                            </a>
                        </div>

                        <div class="mb-4">
                            <img src="{{ asset('assets/img/maps.jpg') }}" alt="Peta Lokasi TK Mekar Tigo Jangko"
                                class="img-fluid rounded shadow" style="max-width:100%; border:3px solid #22c3b3;">
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
@endsection
