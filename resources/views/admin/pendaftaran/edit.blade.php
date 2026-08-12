@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Status Pendaftaran PPDB</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.pendaftaran.update', $pendaftaran->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ $pendaftaran->nama_lengkap }}" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tempat Lahir</label>
                            <input type="text" class="form-control" value="{{ $pendaftaran->tempat_lahir }}" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tanggal Lahir</label>
                            <input type="text" class="form-control"
                                value="{{ date('d-m-Y', strtotime($pendaftaran->tanggal_lahir)) }}" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="{{ $pendaftaran->jenis_kelamin }}" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nama Ayah</label>
                            <input type="text" class="form-control" value="{{ $pendaftaran->nama_ayah }}" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nama Ibu</label>
                            <input type="text" class="form-control" value="{{ $pendaftaran->nama_ibu }}" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Nomor HP</label>
                            <input type="text" class="form-control" value="{{ $pendaftaran->nomor_hp }}" readonly>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold">Alamat</label>
                            <textarea class="form-control" rows="3" readonly>{{ $pendaftaran->alamat }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Status Pendaftaran</label>

                            <select name="status" class="form-select">

                                <option value="Menunggu" {{ $pendaftaran->status == 'Menunggu' ? 'selected' : '' }}>
                                    Menunggu
                                </option>

                                <option value="Diterima" {{ $pendaftaran->status == 'Diterima' ? 'selected' : '' }}>
                                    Diterima
                                </option>

                                <option value="Ditolak" {{ $pendaftaran->status == 'Ditolak' ? 'selected' : '' }}>
                                    Ditolak
                                </option>

                            </select>

                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>

                    </div>

                    <div class="mt-4">

                        <button type="submit" class="btn btn-success">
                            Update Status
                        </button>

                        <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
