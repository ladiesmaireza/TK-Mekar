@extends('layouts.app')

@section('content')
    <section class="py-5 bg-light">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8">


                    <div class="card shadow border-0">


                        <div class="card-header text-center text-white py-3" style="background:#22c3b3;">

                            <h3 class="mb-0">
                                Form Pendaftaran PPDB
                            </h3>

                        </div>



                        <div class="card-body p-4">


                            <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data"
                                class="needs-validation" novalidate>


                                @csrf



                                <!-- =====================
         AKUN ORANG TUA
    ===================== -->

                                <div class="card mb-4 border-0 shadow-sm">


                                    <div class="card-header text-white fw-bold" style="background:#22c3b3;">

                                        👨‍👩‍👧 Akun Orang Tua

                                    </div>


                                    <div class="card-body">


                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                Nama Orang Tua *
                                            </label>

                                            <input type="text" name="nama" class="form-control"
                                                value="{{ old('nama') }}" placeholder="Masukkan nama orang tua" required>

                                        </div>



                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                Email *
                                            </label>

                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email') }}" placeholder="contoh@gmail.com" required>

                                        </div>



                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                Password *
                                            </label>

                                            <input type="password" name="password" class="form-control"
                                                placeholder="Minimal 6 karakter" required>

                                        </div>



                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                Nomor HP *
                                            </label>

                                            <input type="text" name="no_hp" class="form-control"
                                                value="{{ old('no_hp') }}" placeholder="08xxxxxxxxxx" required>

                                        </div>


                                    </div>

                                </div>






                                <!-- =====================
         DATA ANAK
    ===================== -->


                                <div class="card mb-4 border-0 shadow-sm">


                                    <div class="card-header text-white fw-bold" style="background:#22c3b3;">

                                        👧 Data Anak

                                    </div>


                                    <div class="card-body">



                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                Nama Lengkap Anak *
                                            </label>

                                            <input type="text" name="nama_lengkap" class="form-control"
                                                value="{{ old('nama_lengkap') }}" required>

                                        </div>



                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                NIK Anak
                                            </label>

                                            <input type="text" name="nik" class="form-control"
                                                value="{{ old('nik') }}">

                                        </div>



                                        <div class="row">


                                            <div class="col-md-6 mb-3">

                                                <label class="form-label fw-bold">
                                                    Tempat Lahir *
                                                </label>

                                                <input type="text" name="tempat_lahir" class="form-control" required>

                                            </div>



                                            <div class="col-md-6 mb-3">

                                                <label class="form-label fw-bold">
                                                    Tanggal Lahir *
                                                </label>

                                                <input type="date" name="tanggal_lahir" class="form-control" required>

                                            </div>


                                        </div>




                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                Jenis Kelamin *
                                            </label>


                                            <select name="jenis_kelamin" class="form-select" required>


                                                <option value="">
                                                    -- Pilih Jenis Kelamin --
                                                </option>


                                                <option value="Laki-laki">
                                                    Laki-laki
                                                </option>


                                                <option value="Perempuan">
                                                    Perempuan
                                                </option>


                                            </select>

                                        </div>



                                    </div>

                                </div>





                                <!-- =====================
         DATA AYAH IBU
    ===================== -->


                                <div class="card mb-4 border-0 shadow-sm">


                                    <div class="card-header text-white fw-bold" style="background:#22c3b3;">

                                        👨 Data Orang Tua Anak

                                    </div>


                                    <div class="card-body">



                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                Nama Ayah *
                                            </label>

                                            <input type="text" name="nama_ayah" class="form-control" required>

                                        </div>



                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                NIK Ayah
                                            </label>

                                            <input type="text" name="nik_ayah" class="form-control">

                                        </div>




                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                Nama Ibu *
                                            </label>

                                            <input type="text" name="nama_ibu" class="form-control" required>

                                        </div>



                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                NIK Ibu
                                            </label>

                                            <input type="text" name="nik_ibu" class="form-control">

                                        </div>




                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                Alamat *
                                            </label>


                                            <textarea name="alamat" rows="4" class="form-control" required></textarea>


                                        </div>



                                    </div>

                                </div>





                                <!-- =====================
         UPLOAD DOKUMEN
    ===================== -->


                                <div class="card mb-4 border-0 shadow-sm">


                                    <div class="card-header text-white fw-bold" style="background:#22c3b3;">

                                        📂 Upload Dokumen

                                    </div>


                                    <div class="card-body">



                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                Akta Kelahiran *
                                            </label>

                                            <input type="file" name="akta_kelahiran" class="form-control" required>

                                        </div>




                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                Kartu Keluarga *
                                            </label>

                                            <input type="file" name="kartu_keluarga" class="form-control" required>

                                        </div>




                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                KTP Orang Tua *
                                            </label>

                                            <input type="file" name="ktp_orang_tua" class="form-control" required>

                                        </div>




                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                Ijazah PAUD
                                            </label>

                                            <input type="file" name="ijazah_paud" class="form-control">

                                        </div>




                                        <div class="mb-3">

                                            <label class="form-label fw-bold">
                                                Pas Foto
                                            </label>

                                            <input type="file" name="pas_foto" class="form-control">

                                        </div>



                                    </div>

                                </div>





                                <div class="text-center mt-4">


                                    <button type="submit" class="btn btn-success px-5">

                                        Daftar Sekarang

                                    </button>



                                    <a href="{{ route('home') }}" class="btn btn-secondary px-5">

                                        Kembali

                                    </a>


                                </div>



                            </form>


                        </div>


                    </div>


                </div>

            </div>

        </div>


    </section>



    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {


                const form =
                    document.querySelector('.needs-validation');


                form.addEventListener('submit', function(event) {


                    if (!form.checkValidity()) {

                        event.preventDefault();
                        event.stopPropagation();

                    }


                    form.classList.add('was-validated');


                });


            });
        </script>
    @endpush
@endsection
