<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccessRightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_access_right', function (Blueprint $table) {
            $table->tinyIncrements('id')->unsigned();
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('module_id');
            $table->unsignedTinyInteger('access_id');
            $table->index(['module_id', 'access_id','user_id']);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_access_right');
    }
}
