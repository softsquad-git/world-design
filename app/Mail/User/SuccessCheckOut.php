<?php

namespace App\Mail\User;

use App\Models\Products\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuccessCheckOut extends Mailable
{
    use Queueable, SerializesModels;

    public $item;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(object $item)
    {
        $this->item = $item;
    }

    public function prepareData()
    {
        return $this->item->products = Product::whereIn('id', json_decode($this->item->product_ids))->get();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->prepareData();
        return $this->view('emails.user.checkout-success');
    }
}
