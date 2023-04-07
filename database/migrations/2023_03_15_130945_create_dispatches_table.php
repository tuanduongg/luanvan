<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatches', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->text('tittle');
            $table->text('content');
            $table->unsignedBigInteger('type_id')->nullable(false);
            $table->foreign('type_id')->references('id')->on('dispatch_types');
            $table->string('receiver')->nullable(true);
            $table->string('signer')->nullable(false);
            $table->string('sign_date')->nullable(false);
            $table->date('issued_date')->nullable(false);
            $table->string('published_place')->nullable(false);
            $table->date('effective_date')->nullable(false); // ngày hiệu lực
            $table->date('expiration_date')->nullable(false); // ngày hết hiệu lực
            $table->string('archivist'); // nhân viên lưu trữ
            $table->string('storage_location'); // nơi lưu trữ
            $table->integer('role')->default(1); //loại đến or đi (1 đến 2 đi)
            $table->text('file')->nullable(true); // file ảnh hoặc pdf,docx
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
        Schema::dropIfExists('dispatches');
    }
}
