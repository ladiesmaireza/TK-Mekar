@extends('layouts.app')

@section('title', 'PPDB TK Mekar Tigo Jangko')

@section('content')

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-0">

                    <div class="card-body p-5 text-center">

                        <h2 class="mb-3">
                            Penerimaan Peserta Didik Baru
                        </h2>

                        <h4 class="text-muted mb-4">
                            TK Mekar Tigo Jangko
                        </h4>

                        <p class="mb-4">
                            Selamat datang di halaman pendaftaran peserta didik baru
                            TK Mekar Tigo Jangko.
                        </p>

                        <div class="alert alert-info text-start">
                            <strong>Informasi:</strong>
                            <br>
                            Untuk melakukan pendaftaran, silakan membuat
                            akun orang tua terlebih dahulu.
                            Setelah berhasil membuat akun, silakan login
                            untuk melanjutkan pengisian data anak.
                        </div>

                        <div class="mt-4">

                            <a href="{{ route('orangtua.register') }}" class="btn btn-primary px-4 me-2">
                                Daftar Akun Orang Tua
                            </a>

                            <a href="{{ route('orangtua.login') }}" class="btn btn-outline-primary px-4">
                                Login Orang Tua
                            </a>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection
