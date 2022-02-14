<?php

namespace App\Listeners;

use App\Events\QuizPurchased;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class QuizPurchasedNotification
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
     * @param  \App\Events\QuizPurchased  $event
     * @return void
     */
    public function handle(QuizPurchased $event)
    {
        $user = Auth::user();
        Mail::send('email', ['data' => $event->data], function ($m) use ($user) {
            $m->to($user->email)->subject('Thank you for purchasing.');
        });
    }
}
