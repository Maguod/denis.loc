<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $data;

    public function __construct($data)
    {
        $this->data = $data;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this
            ->subject('Вопрос')
            ->markdown('emails.orders.send' )
            ->with([
                'name' => $this->data['name'],
                'phone' => $this->data['phone'],
                'email' => $this->data['email']?: '',
                'message' => $this->data['message'] ?: '',
            ]);
    }
}
