<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade', function (Blueprint $table) {
            $table->id();
            $table->string('name',20);
            $table->string('description', 100);
            $table->unsignedBigInteger('cnb_level_id');
            $table->timestamps();


            //foreing keys
            $table->foreign('cnb_level_id')->references('id')->on('cnb_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade');
    }
}
