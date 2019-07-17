<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\SendEmail;
use Mail;
use App\Mail\UserCommonEmail;
use App\User;
class SendEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SendEmail $event)
    {
        //dd($event->user_info->email);//->email;die;
        $em = new UserCommonEmail(new \App\User);
        Mail::to($event->user_info->email)->send($em);
    }
}
