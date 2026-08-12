@extends('layouts.admin')

@section('content')
    <div class="card shadow">

        <div class="card-body">

            <h3 class="mb-4">
                Halaman Tambah Data Foto Kegiatan Baru
            </h3>



            <div class="card">


                <div class="card-header">

                    <h5 class="mb-0">
                        Data Foto Kegiatan
                    </h5>

                </div>



                <div class="card-body">


                    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">


                        @csrf



                        <div class="mb-3">


                            <label class="form-label">
                                Nama Gambar
                            </label>


                            <input type="text" name="judul" class="form-control" placeholder="Masukkan nama kegiatan"
                                value="{{ old('judul') }}">


                            @error('judul')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror


                        </div>




                        <input type="hidden" name="jenis" value="foto">






                        <div class="mb-3">


                            <label class="form-label">
                                Upload Foto Kegiatan
                            </label>


                            <input type="file" name="gambar" class="form-control" id="gambar"
                                onchange="previewImage(event)">



                            @error('gambar')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror


                        </div>





                        <div class="mb-3">


                            <img id="preview" src="#" width="200" class="img-thumbnail" style="display:none;">


                        </div>






                        <div class="mb-3">


                            <label class="form-label">
                                Keterangan
                            </label>


                            <textarea name="keterangan" class="form-control" rows="4" placeholder="Keterangan kegiatan">{{ old('keterangan') }}</textarea>


                        </div>

                        <button type="submit" class="btn btn-success">


                            Simpan


                        </button>



                        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">


                            Kembali


                        </a>




                    </form>


                </div>


            </div>


        </div>

    </div>



    <script>
        function previewImage(event) {

            let image = document.getElementById('preview');

            image.style.display = 'block';

            image.src = URL.createObjectURL(event.target.files[0]);

        }
    </script>
@endsection
