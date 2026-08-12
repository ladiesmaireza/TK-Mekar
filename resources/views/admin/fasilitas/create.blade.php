@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-body">

                <h4 class="fw-bold mb-4">
                    Tambah Fasilitas
                </h4>


                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf



                    <!-- Nama Fasilitas -->
                    <div class="mb-3">

                        <label class="form-label">
                            Nama Fasilitas
                        </label>


                        <input type="text" name="nama_fasilitas" class="form-control" id="nama_fasilitas"
                            value="{{ old('nama_fasilitas') }}" placeholder="Masukkan nama fasilitas" autocomplete="off"
                            required>

                    </div>



                    <!-- Foto -->
                    <div class="mb-3">

                        <label class="form-label">
                            Foto Fasilitas
                        </label>


                        <input type="file" name="gambar" class="form-control" accept=".jpg,.jpeg,.png" required>


                        <small class="text-muted">
                            Format: JPG, JPEG, PNG (Maksimal 2 MB)
                        </small>

                    </div>


                    <!-- Deskripsi -->
                    <div class="mb-3">

                        <label class="form-label">
                            Deskripsi
                        </label>


                        <textarea name="deskripsi" class="form-control" rows="5" placeholder="Masukkan deskripsi fasilitas" required>{{ old('deskripsi') }}</textarea>

                    </div>



                    <button type="submit" class="btn btn-primary">

                        Simpan

                    </button>


                    <a href="{{ route('fasilitas.index') }}" class="btn btn-secondary">

                        Kembali

                    </a>


                </form>


            </div>

        </div>

    </div>


@endsection
