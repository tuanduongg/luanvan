<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreativeIdeaStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creative_idea_students', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable(false);
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('creative_idea_id')->nullable(false);
            $table->foreign('creative_idea_id')->references('id')->on('creative_ideas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creative_idea_students');
    }
}
