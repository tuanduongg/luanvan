<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theses', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('tittle');
            $table->text('content');
            $table->unsignedBigInteger('lecturer_id');
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->string('school_year');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('archivist'); //nguowif luu tru
            $table->string('storage_location'); // nơi lưu trữ
            $table->text('file')->nullable(true); // file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theses');
    }
}
