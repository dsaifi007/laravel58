<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\User;
class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendemail:minutly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an minutly email to all the users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::all();
        foreach ($user as $a)
        {
         Mail::raw("This is automatically generated Hourly Update", function($message) use ($a)
         {
            $message->from('phptalk11@gmail.com');
            $message->to($a->email)->subject('Hourly Update');
         });
        }
        $this->info('Hourly Update has been send successfully');
    }
}
