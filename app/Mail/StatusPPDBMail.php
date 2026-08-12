<?php

namespace App\Mail;

use App\Models\Pendaftaran;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusPPDBMail extends Mailable
{
    use Queueable, SerializesModels;

    public Pendaftaran $pendaftaran;

    public function __construct(Pendaftaran $pendaftaran)
    {
        $this->pendaftaran = $pendaftaran;
    }

    public function build()
    {
        return $this
            ->subject(
                'Informasi Status PPDB - ' .
                    $this->pendaftaran->nomor_pendaftaran
            )
            ->view('emails.status-ppdb');
    }
}
