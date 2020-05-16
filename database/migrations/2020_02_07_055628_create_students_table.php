<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name",255);
            $table->string("email",50)->unique();
            $table->string("phone",15)->unique();
            $table->text("address")->nullable();
            $table->unsignedTinyInteger('is_enquiry')->default(0)->comment('0=>No,1=>Yes');
            $table->timestamps();
            $table->unsignedSmallInteger('course_id');
            //$table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
