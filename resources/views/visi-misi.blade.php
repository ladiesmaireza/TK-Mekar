@extends('layouts.app')

@section('title', 'Visi dan Misi')

@section('content')
<div class="container" style="margin-top:20px; margin-bottom:40px;">

    <h1 class="text-center mb-5">
        Visi dan Misi
    </h1>

    <div class="card shadow mb-4">

        <div class="card-header bg-primary text-white">
            <h3>Visi</h3>
        </div>

        <div class="card-body">

            @if ($visi)
                {!! $visi->visi !!}
            @else
                Data visi belum tersedia.
            @endif

        </div>

    </div>

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3>Misi</h3>
        </div>

        <div class="card-body">

            @if ($visi)
                {!! nl2br($visi->misi) !!}
            @else
                Data misi belum tersedia.
            @endif

        </div>

    </div>

</div>
@endsection
