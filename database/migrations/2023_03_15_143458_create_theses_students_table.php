<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesesStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theses_students', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable(false);
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('theses_id')->nullable(false);
            $table->foreign('theses_id')->references('id')->on('theses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theses_students');
    }
}
