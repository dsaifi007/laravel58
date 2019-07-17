<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Posts;

class AddPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 500000)->create()->each(function ($user) {
        	$user->posts()->save(factory(App\Posts::class)->make());
    	});
    }
}
