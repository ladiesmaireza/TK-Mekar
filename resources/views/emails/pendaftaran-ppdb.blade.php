<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Bukti Pendaftaran PPDB</title>
</head>

<body style="margin:0; padding:0; background:#f3f6fa; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:30px 10px;">

        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:12px; overflow:hidden;">

                    <tr>
                        <td style="background:#1f4e79; padding:25px; color:#ffffff; text-align:center;">

                            <div style="font-size:21px; font-weight:bold;">
                                TK MEKAR TIGO JANGKO
                            </div>

                            <div style="margin-top:6px;">
                                PPDB Tahun Ajaran 2026/2027
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td style="padding:30px;">

                            <h2 style="color:#1f4e79;">
                                Pendaftaran Berhasil
                            </h2>

                            <p>
                                Yth. Bapak/Ibu,
                            </p>

                            <p>
                                Pendaftaran peserta didik baru telah berhasil
                                dikirim ke sistem TK Mekar Tigo Jangko.
                            </p>

                            <table width="100%" cellpadding="10" cellspacing="0"
                                style="background:#f5f8fb; border:1px solid #d9e2ec;">

                                <tr>
                                    <td width="40%"><strong>Nomor Pendaftaran</strong></td>
                                    <td>
                                        {{ $pendaftaran->nomor_pendaftaran }}
                                    </td>
                                </tr>

                                <tr>
                                    <td><strong>Nama Peserta Didik</strong></td>
                                    <td>
                                        {{ $pendaftaran->nama_lengkap }}
                                    </td>
                                </tr>

                                <tr>
                                    <td><strong>Status</strong></td>
                                    <td>
                                        {{ $pendaftaran->status ?? 'Menunggu' }}
                                    </td>
                                </tr>

                            </table>

                            <p style="margin-top:20px;">
                                Silakan menunggu proses verifikasi dari pihak sekolah.
                                Informasi mengenai perubahan status pendaftaran akan
                                dikirimkan melalui email ini.
                            </p>

                            <p>
                                Mohon simpan nomor pendaftaran Anda.
                            </p>

                            <hr style="border:none; border-top:1px solid #ddd; margin:25px 0;">

                            <p style="font-size:12px; color:#777;">
                                Email ini dikirim secara otomatis oleh Sistem Informasi
                                TK Mekar Tigo Jangko.
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
