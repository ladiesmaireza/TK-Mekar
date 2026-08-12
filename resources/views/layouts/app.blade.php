<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website resmi TK Mekar Tigo Jangko">
    <meta name="author" content="TK Mekar Tigo Jangko">

    <title>@yield('title', 'TK Mekar Tigo Jangko')</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/logo-tk.jpg') }}" type="image/x-icon">
    <link href="{{ asset('assets/libs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    @yield('styles')
    @stack('styles')
</head>

<body>

    {{-- Header + Navbar --}}
    @include('layouts.navbar')

    {{-- Isi Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')
    @stack('scripts')

</body>

</html>
