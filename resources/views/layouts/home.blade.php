<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TK Mekar Tigo Jangko</title>

    <meta name="description" content="Website Resmi TK Mekar Tigo Jangko">
    <meta name="author" content="TK Mekar Tigo Jangko">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-tk.jpg') }}" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="{{ asset('assets/libs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>

    {{-- Header + Navbar --}}
    @include('layouts.navbar')

    {{-- Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Tombol Kembali ke Atas --}}
    <button onclick="window.scrollTo({top:0,behavior:'smooth'})" id="btnTop"
        class="btn btn-success rounded-circle shadow"
        style="position:fixed;bottom:20px;right:20px;width:50px;height:50px;">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
