@extends('layouts.admin')

@section('title', 'Dashboard Super Admin')

@section('content')

    <div class="container-fluid" style="margin-top: -50px;">
        <h4 class="fw-bold mb-4">
            Dashboard Super Admin
        </h4>

        <div class="row">

            {{-- Jumlah User Admin --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">

                        <h6 class="text-muted">
                            Jumlah User Admin
                        </h6>

                        <h2 class="fw-bold text-primary">
                            {{ \App\Models\User::where('role', 'admin')->count() }}
                        </h2>

                        <p class="mb-0">
                            Total pengguna admin sistem
                        </p>

                    </div>
                </div>
            </div>

            {{-- Jumlah Aktivitas --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">

                        <h6 class="text-muted">
                            Jumlah Aktivitas
                        </h6>

                        <h2 class="fw-bold text-success">
                            {{ \App\Models\ActivityLog::count() }}
                        </h2>

                        <p class="mb-0">
                            Total aktivitas pengguna
                        </p>

                    </div>
                </div>
            </div>

            {{-- Informasi Sistem --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">

                        <h6 class="text-muted">
                            Informasi Sistem
                        </h6>

                        <p class="mb-1">
                            <b>Website:</b>
                            TK Mekar Tigo Jangko
                        </p>

                        <p class="mb-1">
                            <b>Framework:</b>
                            Laravel
                        </p>

                        <p class="mb-0">
                            <b>Role:</b>
                            Super Admin
                        </p>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
