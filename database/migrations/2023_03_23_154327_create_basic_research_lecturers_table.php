<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicResearchLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_research_lecturers', function (Blueprint $table) {
            $table->unsignedBigInteger('lecturer_id')->nullable(false);
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->unsignedBigInteger('basic_research_id')->nullable(false);
            $table->foreign('basic_research_id')->references('id')->on('basic_research');
            $table->boolean('isLeader')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basic_research_lecturers');
    }
}
