<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor', function (Blueprint $table) {
            $table->unsignedBigInteger('dpi')->unique()->primary();
            $table->string('name', 50);
            $table->string('last_name', 50);
            $table->unsignedBigInteger('school_id');
 /**pendiente agregar relaciòn con escuela */
            $table->timestamps();

            // foreing keys
            $table->foreign('school_id')->references('id')->on('school');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professor');
    }
}
