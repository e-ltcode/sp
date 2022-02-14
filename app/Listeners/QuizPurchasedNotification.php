<?php

namespace App\Listeners;

use App\Events\QuizPurchased;
use Illuminate\Support\Facades\Log;
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
        $email = $event->data['email'];
        $emails = [trim($user->email), trim($email)];
        Mail::send('email', ['data' => $event->data], function ($m) use ($emails) {
            $m->to($emails)->subject('Thank you for purchasing.');
        });
    }
}
