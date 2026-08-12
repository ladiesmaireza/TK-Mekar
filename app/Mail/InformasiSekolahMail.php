<?php

namespace App\Mail;

use App\Models\InformasiSekolah;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InformasiSekolahMail extends Mailable
{
    use Queueable, SerializesModels;

    public InformasiSekolah $informasi;

    public function __construct(InformasiSekolah $informasi)
    {
        $this->informasi = $informasi;
    }

    public function build()
    {
        return $this
            ->subject(
                'Informasi Sekolah - ' .
                    $this->informasi->judul
            )
            ->view('emails.informasi-sekolah');
    }
}
