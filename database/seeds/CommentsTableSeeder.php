<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <= 20 ; $i++) {
		    DB::table('comments')->insert([
	            'post_id' => 2,
	            'comment' => Str::random(50),
	            'created_at' => Carbon::now()->toDateTimeString(),
		        'updated_at' => Carbon::now()->toDateTimeString()
	        ]);
		}
    }
}
