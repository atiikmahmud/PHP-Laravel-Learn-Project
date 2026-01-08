<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendProductCreatedEmail implements ShouldQueue
{
    public function handle(ProductCreated $event)
    {
        $product = $event->product;

        Mail::raw(
            "New product created: {$product->name}",
            function ($message) {
                $message->to('atik@shajgoj.com')
                        ->subject('New Product Created');
            }
        );
    }
}
