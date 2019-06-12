<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;
use App\Posts;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* factory(App\User::class, 50)->create()->each(function ($user) {
	        $user->posts()->save(factory(App\User::class)->make());
	    });*/
	    for ($i=0; $i <= 20 ; $i++) {
		    DB::table('users')->insert([
	            'name' => Str::random(10),
	            'email' => Str::random(10).'@gmail.com',
	            'password' => bcrypt('secret'),
	            'api_token'=>Str::random(50),
	            'created_at' => Carbon::now()->toDateTimeString(),
		        'updated_at' => Carbon::now()->toDateTimeString()
	        ]);
		}
    }
}
