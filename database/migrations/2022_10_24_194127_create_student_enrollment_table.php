<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEnrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_enrollment', function (Blueprint $table) {
            $table->id();
            $table->string('student_personal_code', '10 char');
            $table->unsignedBigInteger('grade_id');
            $table->char('section', '1 char');
            $table->unsignedBigInteger('class_schedule_id');
            $table->unsignedBigInteger('professor_dpi');
            $table->timestamp('enrollment_date');
            $table->timestamps();


            // foreing keys
            $table->foreign('student_personal_code')->references('personal_code')->on('student');
            $table->foreign('professor_dpi')->references('dpi')->on('professor');
            $table->foreign('grade_id')->references('id')->on('grade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_enrollment');
    }
}
