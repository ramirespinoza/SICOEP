<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->string('personal_code', '10 char')->unique()->primary();
            $table->string('name', '50 char');
            $table->string('last_name', '50 char');
            $table->unsignedBigInteger('grade_id');
            $table->char('section', '1 char');
            $table->date('birth_date');
            $table->string('identification_document', '5 char');
            $table->unsignedBigInteger('identification_document_number');
            $table->unsignedBigInteger('class_schedule_id');
            $table->unsignedBigInteger('professor_dpi');
            $table->string('tutelary_name', '50 char');
            $table->unsignedBigInteger('tutelary_dpi');
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
        Schema::dropIfExists('student');
    }
}
