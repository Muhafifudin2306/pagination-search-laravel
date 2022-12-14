<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->date('tanggal');
            $table->unsignedBigInteger('genre_id')->nullable();
            $table->float('rating');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('genre_id')->references('genre_id')->on('genres')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
