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
            $table->string('personal_code', 10)->unique()->primary();
            $table->string('name', 50);
            $table->string('last_name', 50);
            $table->date('birth_date');
            $table->string('identification_document', 5);
            $table->unsignedBigInteger('identification_document_number');
            $table->string('tutelary_name', 50);
            $table->unsignedBigInteger('tutelary_dpi');
            $table->timestamps();

            /* En espera demás tablas para implementar foreing keys*/
            // foreing keys
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
