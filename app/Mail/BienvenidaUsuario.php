<?php

namespace App\Mail;

use App\Models\User; // ✅ IMPORTANTE
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BienvenidaUsuario extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('¡Bienvenido a la aplicación!')
                    ->view('emails.bienvenida')
                    ->with([
                        'user' => $this->user,
                    ]);
    }
}
