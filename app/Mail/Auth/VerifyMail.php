<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use App\Entity\User;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
       $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('admin@varvik.com.ua')
            ->subject('Verify email')
            ->markdown('mail.auth.register.verify');
    }
}
