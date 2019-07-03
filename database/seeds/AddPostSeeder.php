<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AddPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i <= 20 ; $i++) { 
    		DB::table('posts')->insert([
	            'post_title' => Str::random(10),
	            'post_description' => Str::random(100),
	            'user_id' => 1,
	            'created_at' => Carbon::now()->toDateTimeString(),
	            'updated_at' => Carbon::now()->toDateTimeString(),
        	]);
    	}

    }
}
