<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('institution_name', 500)->unique();
            $table->text('institution_address');
            $table->string('email',50)->unique();
            $table->string('direct_number',15)->unique();
            $table->string('alternative_number',15)->unique();
            $table->string('contact_person', 50);
             $table->string('institution_img', 255);
            $table->smallInteger('country_id')->unsigned();
            $table->smallInteger('city_id')->unsigned();
            $table->tinyInteger('timezone_id')->unsigned();
            $table->char('instution_code', 10)->unique();
            $table->unique('email');
            $table->unique('direct_number');
            $table->unique('alternative_number');
            $table->unique('instution_code');
            $table->timestamps();
            $table->index(['country_id','city_id','timezone_id']);
            $table->foreign('country_id')->references('country_id')->on('country');
            $table->foreign('city_id')->references('city_id')->on('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institutions');
    }
}
