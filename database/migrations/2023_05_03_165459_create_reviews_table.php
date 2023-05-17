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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('genre_id')->unsigned();
            $table->bigInteger('band_id')->unsigned();
            $table->string('album_title');
            $table->string('album_image');
            $table->string('album_year');
            $table->string('album_link');
            $table->longText('album_review');
            $table->timestamps();

            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->foreign('band_id')->references('id')->on('bands')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
