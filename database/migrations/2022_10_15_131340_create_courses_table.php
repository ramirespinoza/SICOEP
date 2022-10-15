<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->string('id', '10 char')->unique()->primary();
            $table->string('name', '50 char');
            $table->string('description', '100 char');
            $table->timestamps();

            /* En espera demás tablas para implementar foreing keys*/
            // foreing keys
            //$table->foreign('professor_dpi')->references('dpi')->on('professor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
