<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\User;
//use Mail;
use App\Jobs\Job;
use App\Mail\UserCommonEmail;

class EmailSendingToUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        //dd($this->user);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emaildata = new UserCommonEmail($this->user);
        Mail::to($this->user->email)->send($emaildata);
    }
}
