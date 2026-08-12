@extends('layouts.admin')

@section('content')
    <style>
        table th,
        table td {
            white-space: nowrap;
            vertical-align: middle;
        }
    </style>
    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-body">

                <h4 class="fw-bold mb-4">
                    Data Pendaftaran PPDB
                </h4>

                <div class="table-responsive">

                    <table class="table table-bordered table-striped">

                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Akta Kelahiran</th>
                                <th>Kartu Keluarga</th>
                                <th>KTP Orang Tua</th>
                                <th>Ijazah</th>
                                <th>Pas Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($pendaftaran as $item)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $item->nama_lengkap }}</td>

                                    <td>{{ $item->tempat_lahir }}</td>

                                    <td>{{ date('d-m-Y', strtotime($item->tanggal_lahir)) }}</td>

                                    <td>{{ $item->jenis_kelamin }}</td>

                                    <td>{{ $item->nama_ayah }}</td>

                                    <td>{{ $item->nama_ibu }}</td>

                                    <td>{{ $item->nomor_hp }}</td>

                                    <td>{{ $item->alamat }}</td>

                                    <td>
                                        @if ($item->akta_kelahiran)
                                            <a href="{{ asset('storage/' . $item->akta_kelahiran) }}" target="_blank"
                                                class="btn btn-success btn-sm">
                                                Lihat
                                            </a>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->kartu_keluarga)
                                            <a href="{{ asset('storage/' . $item->kartu_keluarga) }}" target="_blank"
                                                class="btn btn-success btn-sm">
                                                Lihat
                                            </a>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->ktp_orang_tua)
                                            <a href="{{ asset('storage/' . $item->ktp_orang_tua) }}" target="_blank"
                                                class="btn btn-success btn-sm">
                                                Lihat
                                            </a>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->ijazah_paud)
                                            <a href="{{ asset('storage/' . $item->ijazah_paud) }}" target="_blank"
                                                class="btn btn-success btn-sm">
                                                Lihat
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->pas_foto)
                                            <a href="{{ asset('storage/' . $item->pas_foto) }}" target="_blank"
                                                class="btn btn-success btn-sm">
                                                Lihat
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>

                                        @if ($item->status == 'Menunggu')
                                            <span class="badge bg-warning">Menunggu</span>
                                        @elseif($item->status == 'Diterima')
                                            <span class="badge bg-success">Diterima</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif

                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center gap-2">

                                            <a href="{{ route('admin.pendaftaran.show', $item->id) }}"
                                                class="btn btn-info btn-sm">
                                                Detail
                                            </a>

                                            <a href="{{ route('admin.pendaftaran.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.pendaftaran.destroy', $item->id) }}"
                                                method="POST" class="m-0"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="16" class="text-center">
                                        Belum ada data pendaftaran.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
@endsection
