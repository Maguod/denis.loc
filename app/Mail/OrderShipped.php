<?php

namespace App\Mail;

//use App\Entity\User;
use App\Entity\Uploader;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

private $data;
private $product;
    public function __construct($data, Uploader $product = null)
    {
        $this->data = $data;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this
            ->subject('Заказ или вопрос')
            ->markdown('emails.orders.shipped' )
            ->with([
                'name' => $this->data['name'],
                'phone' => $this->data['phone'],
                'email' => $this->data['email'] ?? '',
                'message' => $this->data['message'] ?: '',
                'id' => $this->product ? $this->product->id : '',
                'seller' => $this->product ? $this->product->seller : '',
                'code' => $this->product ? $this->product->code : '',
                'price' => $this->product ? $this->product->price : '',

            ]);
    }
}
