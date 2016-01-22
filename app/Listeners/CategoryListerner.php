<?php

namespace App\Listeners;

use App\Events\CategoryEdited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class CategoryListerner
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
     * @param  CategoryEdited  $event
     * @return void
     */
    public function handle(CategoryEdited $event)
    {
        //dd($event->category);
        echo $event->category->name." Has been edited";

        Mail::send('admin.emails.test', ['category' => $event->category], function ($m) use ($event) {
            //$m->from('sarath.hacks@gmail.com', 'Your Application');

            $m->to('sarathtvmala@gmail.com', $event->category->name)->subject('Your Reminder!');
        });
    }
}
