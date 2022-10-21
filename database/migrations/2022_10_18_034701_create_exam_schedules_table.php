<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id');
            $table->string('bimestre');
            $table->date('date_');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('course');
        });
    }


    public function down()
    {
        Schema::dropIfExists('exam_schedules');
    }
}
