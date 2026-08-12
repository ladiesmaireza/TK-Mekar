@extends('layouts.admin')

@section('title', 'Profil Sekolah')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Profil Sekolah
            </h4>

            <p class="text-muted mb-0">
                Kelola informasi profil sekolah dan sambutan kepala sekolah.
            </p>
        </div>

        @if($profil->count() == 0)

            <a href="{{ route('profil.create') }}"
               class="btn btn-primary">
                Tambah Profil
            </a>

        @endif

    </div>


    {{-- Pesan sukses --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Data Profil --}}
    @if($profil->count() > 0)

        @foreach($profil as $item)

            <div class="card shadow-sm border-0 mb-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h5 class="fw-bold mb-0">
                            Data Profil Sekolah
                        </h5>

                        <div>

                            <a href="{{ route('profil.edit', ['id' => $item->id]) }}"
                               class="btn btn-warning btn-sm">
                                Edit Profil
                            </a>

                            <form action="{{ route('profil.destroy', ['id' => $item->id]) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus profil sekolah ini?')">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </div>


                    {{-- INFORMASI SEKOLAH --}}
                    <div class="row">

                        <div class="col-md-7">

                            <table class="table table-borderless">

                                <tr>
                                    <th width="35%">Nama Sekolah</th>
                                    <td>
                                        {{ $item->nama_sekolah }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Alamat</th>
                                    <td>
                                        {{ $item->alamat }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Telepon</th>
                                    <td>
                                        {{ $item->telepon }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                </tr>

                            </table>

                        </div>


                        {{-- FOTO KEPALA SEKOLAH --}}
                        <div class="col-md-5 text-center">

                            <h6 class="fw-bold mb-3">
                                Foto Kepala Sekolah
                            </h6>

                            @if($item->foto_kepala_sekolah)

                                <img src="{{ asset('storage/' . $item->foto_kepala_sekolah) }}"
                                     alt="Foto Kepala Sekolah"
                                     class="rounded shadow"
                                     style="width:180px;
                                            height:220px;
                                            object-fit:cover;">

                            @else

                                <div class="border rounded p-4 text-muted">

                                    Foto kepala sekolah belum tersedia.

                                </div>

                            @endif

                        </div>

                    </div>


                    <hr class="my-4">


                    {{-- SEJARAH --}}
                    <div class="mb-4">

                        <h6 class="fw-bold text-success mb-3">
                            Sejarah Sekolah
                        </h6>

                        <p style="text-align:justify;
                                  line-height:1.8;">

                            {{ $item->sejarah }}

                        </p>

                    </div>


                    {{-- SAMBUTAN KEPALA SEKOLAH --}}
                    <div>

                        <h6 class="fw-bold text-success mb-3">
                            Sambutan Kepala Sekolah
                        </h6>

                        @if($item->sambutan_kepala_sekolah)

                            <div class="bg-light rounded p-4"
                                 style="white-space:pre-line;
                                        text-align:justify;
                                        line-height:1.8;">

                                {{ $item->sambutan_kepala_sekolah }}

                            </div>

                        @else

                            <div class="alert alert-warning">
                                Sambutan kepala sekolah belum tersedia.
                            </div>

                        @endif

                    </div>

                </div>

            </div>

        @endforeach

    @else

        <div class="card shadow-sm border-0">

            <div class="card-body text-center py-5">

                <h5 class="text-muted">
                    Data profil sekolah belum tersedia.
                </h5>

                <p class="text-muted">
                    Silakan tambahkan profil sekolah terlebih dahulu.
                </p>

                <a href="{{ route('profil.create') }}"
                   class="btn btn-primary">

                    Tambah Profil Sekolah

                </a>

            </div>

        </div>

    @endif

</div>

@endsection
