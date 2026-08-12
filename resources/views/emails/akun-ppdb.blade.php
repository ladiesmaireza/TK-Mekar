<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>Akun PPDB TK Mekar Tigo Jangko</title>
</head>

<body style="margin:0; padding:0; background:#f3f6fa; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:30px 10px;">

        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:12px; overflow:hidden;">

                    <tr>
                        <td style="background:#1f4e79; padding:25px; text-align:center; color:#ffffff;">

                            <div style="font-size:22px; font-weight:bold;">
                                TK MEKAR TIGO JANGKO
                            </div>

                            <div style="margin-top:7px; font-size:14px;">
                                Penerimaan Peserta Didik Baru
                            </div>

                            <div style="margin-top:4px; font-size:13px;">
                                Tahun Ajaran 2026/2027
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td style="padding:30px;">

                            <h2 style="color:#1f4e79; margin-top:0;">
                                Akun PPDB Berhasil Dibuat
                            </h2>

                            <p>
                                Yth. Bapak/Ibu
                                <strong>{{ $orangTua->nama_ayah ?? $orangTua->nama_ibu }}</strong>,
                            </p>

                            <p>
                                Akun orang tua untuk proses PPDB
                                TK Mekar Tigo Jangko telah berhasil dibuat.
                            </p>

                            <table width="100%" cellpadding="10" cellspacing="0"
                                style="background:#f5f8fb; border:1px solid #d9e2ec;">

                                <tr>
                                    <td width="35%"><strong>Email</strong></td>
                                    <td>{{ $orangTua->email }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Password</strong></td>
                                    <td>{{ $password }}</td>
                                </tr>

                            </table>

                            <p style="margin-top:20px;">
                                Silakan simpan informasi akun ini dengan baik.
                            </p>

                            <p>
                                Akun tersebut dapat digunakan untuk mengikuti
                                proses pendaftaran PPDB dan menerima informasi
                                dari pihak sekolah.
                            </p>

                            <hr style="border:none; border-top:1px solid #ddd; margin:25px 0;">

                            <p style="font-size:12px; color:#777;">
                                Email ini dikirim secara otomatis oleh
                                Sistem Informasi TK Mekar Tigo Jangko.
                            </p>

                        </td>
                    </tr>

                    <tr>
                        <td style="background:#f3f6fa; padding:18px; text-align:center; font-size:12px; color:#777;">

                            TK Mekar Tigo Jangko<br>
                            Sistem Informasi PPDB

                        </td>
                    </tr>

                </table>

            </td>
        </tr>

    </table>

</body>

</html>
