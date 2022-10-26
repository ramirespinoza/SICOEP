<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description', 100);
            $table->unsignedBigInteger('cnb_level_id');
            $table->timestamps();

            /* En espera demás tablas para implementar foreing keys*/
            // foreing keys
            //$table->foreign('professor_dpi')->references('dpi')->on('professor');
            $table->foreign('cnb_level_id')->references('id')->on('cnb_level');
        });
    }

    public function down()
    {
        Schema::dropIfExists('course');
    }
}
