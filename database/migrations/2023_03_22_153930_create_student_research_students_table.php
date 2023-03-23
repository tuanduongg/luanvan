<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentResearchStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_research_students', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable(false);
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('student_research_id')->nullable(false);
            $table->foreign('student_research_id')->references('id')->on('student_research');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_research_students');
    }
}
