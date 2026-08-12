<?php

namespace App\Mail;

use App\Models\OrangTua;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AkunPPDBMail extends Mailable
{
    use Queueable, SerializesModels;

    public OrangTua $orangTua;
    public string $password;

    public function __construct(OrangTua $orangTua, string $password)
    {
        $this->orangTua = $orangTua;
        $this->password = $password;
    }

    public function build()
    {
        return $this
            ->subject('Akun PPDB TK Mekar Tigo Jangko')
            ->view('emails.akun-ppdb');
    }
}
