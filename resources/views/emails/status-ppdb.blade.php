<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Status PPDB</title>
</head>

<body style="margin:0; padding:0; background:#f3f6fa; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:30px 10px;">

        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:12px; overflow:hidden;">

                    <tr>
                        <td style="background:#1f4e79; padding:25px; color:white; text-align:center;">

                            <strong style="font-size:21px;">
                                TK MEKAR TIGO JANGKO
                            </strong>

                            <div style="margin-top:6px;">
                                Informasi PPDB 2026/2027
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td style="padding:30px;">

                            <h2 style="color:#1f4e79;">
                                Perubahan Status Pendaftaran
                            </h2>

                            <p>
                                Yth. Bapak/Ibu,
                            </p>

                            <p>
                                Pihak TK Mekar Tigo Jangko telah memperbarui
                                status pendaftaran peserta didik berikut:
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
                                    <td><strong>Status Baru</strong></td>
                                    <td>
                                        <strong>{{ $pendaftaran->status }}</strong>
                                    </td>
                                </tr>

                            </table>

                            <p style="margin-top:20px;">
                                Silakan periksa informasi tersebut dan ikuti arahan
                                dari pihak sekolah apabila diperlukan.
                            </p>

                            <p>
                                Untuk informasi lebih lanjut, silakan menghubungi
                                TK Mekar Tigo Jangko.
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
