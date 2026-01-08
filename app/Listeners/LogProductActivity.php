<?php

namespace App\Listeners;

use App\Models\ActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogProductActivity
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $product = $event->product;

        ActivityLog::create([
            'action' => class_basename($event),
            'model' => 'Product',
            'model_id' => $product->id,
            'description' => "Product {$product->name} was " . strtolower(str_replace('Product', '', class_basename($event)))
        ]);
    }
}
