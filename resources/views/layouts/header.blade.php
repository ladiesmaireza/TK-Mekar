<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>

    <link href="{{ asset('assets/libs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">

        <span class="navbar-brand">
            Dashboard Admin TK Mekar Tigo Jangko
        </span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="btn btn-light btn-sm">
                Logout
            </button>
        </form>

    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 bg-light min-vh-100 p-3">

            <h5>Menu</h5>
            <hr>

            <a href="{{ route('admin.dashboard') }}" class="d-block mb-2">Dashboard</a>
            <a href="{{ route('profil.index') }}" class="d-block mb-2">Profil</a>
            <a href="{{ route('visi-misi.index') }}" class="d-block mb-2">Visi Misi</a>
            <a href="{{ route('guru.index') }}" class="d-block mb-2">Guru</a>
            <a href="{{ route('fasilitas.index') }}" class="d-block mb-2">Fasilitas</a>
            <a href="{{ route('galeri.index') }}" class="d-block mb-2">Galeri</a>
            <a href="{{ route('berita.index') }}" class="d-block mb-2">Berita</a>
            <a href="{{ route('kontak.index') }}" class="d-block mb-2">Kontak</a>

        </div>

        <div class="col-md-10 p-4">
            @yield('content')
        </div>

    </div>
</div>

<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
