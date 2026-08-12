<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>
        {{ $informasi->judul }}
    </title>
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
                                INFORMASI SEKOLAH
                            </div>

                        </td>

                    </tr>

                    <tr>

                        <td style="padding:30px;">

                            <div style="font-size:20px; font-weight:bold; color:#1f4e79; margin-bottom:15px;">

                                {{ $informasi->judul }}

                            </div>

                            <div style="font-size:14px; line-height:1.8; color:#333;">

                                {!! nl2br(e($informasi->isi)) !!}

                            </div>

                            <hr style="border:none; border-top:1px solid #ddd; margin:25px 0;">

                            <p style="font-size:12px; color:#777;">

                                Informasi ini dikirim oleh pihak
                                TK Mekar Tigo Jangko kepada orang tua/wali peserta didik.

                            </p>

                        </td>

                    </tr>

                    <tr>

                        <td style="background:#f3f6fa; padding:18px; text-align:center; font-size:12px; color:#777;">

                            TK Mekar Tigo Jangko<br>
                            Sistem Informasi Sekolah

                        </td>

                    </tr>

                </table>

            </td>
        </tr>

    </table>

</body>

</html>
