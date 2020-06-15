<?php

namespace App\UseCases\Auth;


use App\Entity\User;
use App\Mail\Auth\VerifyMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Mail\Mailer as MailerInterface;
use Illuminate\Support\Facades\Auth;


class RegisterService
{
    /**
     * RegisterService constructor.
     * @param MailerInterface $mailer
     */
    private  $mailer;
    private  $dispatcher;
    public function __construct(MailerInterface $mailer, Dispatcher $dispatcher)
    {
        $this->mailer = $mailer;
        $this->dispatcher = $dispatcher;
    }

    public function register(array $data) :void
    {
        $user = User::register(
            $data['name'],
            $data['email'],
            $data['password']
        );
        Auth::logout();
        $this->mailer->to($user->email)->send(new VerifyMail($user));
        $this->dispatcher->dispatch(new Registered($user));

    }

    public function verify($id) :void
    {
        $user = User::findOrFail($id);
        $user->verify();
    }
}