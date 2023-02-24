<?php

namespace App\Listeners;

use App\Events\clear;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SovgaController
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
     * @param  \App\Events\clear  $event
     * @return void
     */
    public function handle(clear $event)
    {
        //
    }
}
