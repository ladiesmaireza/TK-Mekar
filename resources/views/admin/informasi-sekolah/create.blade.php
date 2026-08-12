@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <div class="mb-4">

            <h3 class="mb-1">
                Kirim Informasi Sekolah
            </h3>

            <p class="text-muted">
                Informasi akan dikirim ke email orang tua yang terdaftar.
            </p>

        </div>

        @if ($errors->any())
            <div class="alert alert-danger">

                <strong>
                    Terdapat kesalahan:
                </strong>

                <ul class="mb-0 mt-2">

                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach

                </ul>

            </div>
        @endif

        <div class="card">

            <div class="card-body">

                <form method="POST" action="{{ route('admin.informasi.store') }}">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Judul Informasi
                        </label>

                        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}"
                            placeholder="Contoh: Informasi Libur Sekolah" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Isi Informasi
                        </label>

                        <textarea name="isi" class="form-control" rows="8"
                            placeholder="Tuliskan informasi yang ingin disampaikan kepada orang tua..." required>{{ old('isi') }}</textarea>

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Penerima
                        </label>

                        <select name="penerima" class="form-select" required>

                            <option value="semua">
                                Semua Orang Tua
                            </option>

                        </select>

                    </div>

                    <div class="alert alert-warning">

                        <strong>Perhatian</strong>

                        <br>

                        Setelah tombol kirim ditekan, informasi akan
                        dikirim ke alamat email orang tua yang tersimpan
                        pada sistem PPDB.

                    </div>

                    <div class="d-flex gap-2">

                        <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">
                            Batal
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Kirim Informasi ke Email Orang Tua
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
