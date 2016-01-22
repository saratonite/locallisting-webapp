<?php

namespace App\Listeners;

use App\Events\VendorStatusChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class VendorListener
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
     * @param  VendorStatusChanged  $event
     * @return void
     */
    public function handle(VendorStatusChanged $event)
    {
        //
    }
}
