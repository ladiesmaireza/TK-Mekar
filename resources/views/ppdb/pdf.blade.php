<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Bukti Pendaftaran</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 6px;
            border: 1px solid #000;
        }
    </style>
</head>

<body>

    <h2>BUKTI PENDAFTARAN PPDB</h2>

    <table>

        <tr>
            <td>Nama Lengkap</td>
            <td>{{ $pendaftaran->nama_lengkap }}</td>
        </tr>

        <tr>
            <td>NIK</td>
            <td>{{ $pendaftaran->nik }}</td>
        </tr>

        <tr>
            <td>Tempat Lahir</td>
            <td>{{ $pendaftaran->tempat_lahir }}</td>
        </tr>

        <tr>
            <td>Tanggal Lahir</td>
            <td>{{ $pendaftaran->tanggal_lahir }}</td>
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>{{ $pendaftaran->jenis_kelamin }}</td>
        </tr>

        <tr>
            <td>Nama Ayah</td>
            <td>{{ $pendaftaran->nama_ayah }}</td>
        </tr>

        <tr>
            <td>Nama Ibu</td>
            <td>{{ $pendaftaran->nama_ibu }}</td>
        </tr>

        <tr>
            <td>Nomor HP</td>
            <td>{{ $pendaftaran->nomor_hp }}</td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>{{ $pendaftaran->alamat }}</td>
        </tr>

        <tr>
            <td>Status</td>
            <td>{{ $pendaftaran->status }}</td>
        </tr>

    </table>

    <br><br>

    <p style="text-align:center">
        Dokumen ini merupakan bukti resmi pendaftaran PPDB.
    </p>

</body>

</html>
