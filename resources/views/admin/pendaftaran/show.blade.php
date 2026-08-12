@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Detail Pendaftaran PPDB</h4>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $pendaftaran->nama_lengkap }}" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Tempat Lahir</label>
                        <input type="text" class="form-control" value="{{ $pendaftaran->tempat_lahir }}" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Tanggal Lahir</label>
                        <input type="text" class="form-control" value="{{ $pendaftaran->tanggal_lahir }}" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Jenis Kelamin</label>
                        <input type="text" class="form-control" value="{{ $pendaftaran->jenis_kelamin }}" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Nama Ayah</label>
                        <input type="text" class="form-control" value="{{ $pendaftaran->nama_ayah }}" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Nama Ibu</label>
                        <input type="text" class="form-control" value="{{ $pendaftaran->nama_ibu }}" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Nomor HP Orang Tua</label>
                        <input type="text" class="form-control" value="{{ $pendaftaran->nomor_hp }}" readonly>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="fw-bold">Alamat</label>
                        <textarea class="form-control" rows="3" readonly>{{ $pendaftaran->alamat }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Akta Kelahiran</label><br>

                        <a href="{{ asset('storage/' . $pendaftaran->akta_kelahiran) }}" target="_blank"
                            class="btn btn-success btn-sm">

                            Lihat Akta

                        </a>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Ijazah PAUD</label><br>

                        @if ($pendaftaran->ijazah_paud)
                            <a href="{{ asset('storage/' . $pendaftaran->ijazah_paud) }}" target="_blank"
                                class="btn btn-success btn-sm">

                                Lihat Ijazah

                            </a>
                        @else
                            <span class="text-danger">
                                Tidak ada file
                            </span>
                        @endif

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">KTP Orang Tua</label><br>

                        <a href="{{ asset('storage/' . $pendaftaran->ktp_orang_tua) }}" target="_blank"
                            class="btn btn-success btn-sm">

                            Lihat KTP

                        </a>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Kartu Keluarga</label><br>

                        <a href="{{ asset('storage/' . $pendaftaran->kartu_keluarga) }}" target="_blank"
                            class="btn btn-success btn-sm">

                            Lihat KK

                        </a>
                    </div>

                    <!-- Pas Foto -->
                    <div class="col-md-6 mb-4">
                        <label class="fw-bold d-block">Pas Foto</label>

                        @if ($pendaftaran->pas_foto)
                            <a href="{{ asset('storage/' . $pendaftaran->pas_foto) }}" target="_blank"
                                class="btn btn-success btn-sm">
                                Lihat Pas Foto
                            </a>
                        @else
                            <span class="text-danger">Pas foto belum diupload</span>
                        @endif
                    </div>

                </div>

                <div class="col-md-12 mt-3">

                    <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-secondary">

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>

    </div>
@endsection
