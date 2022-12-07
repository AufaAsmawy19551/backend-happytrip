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
        Schema::create('rating_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('traveler_id');
            $table->unsignedBigInteger('wisata_id');
            $table->integer('rating')->nullable();
            $table->string('review')->default(0);
            $table->timestamps();

            //relationship with travelers table
            $table
                ->foreign('traveler_id')
                ->references('id')
                ->on('travelers');

            //relationship with wisatas table
            $table
                ->foreign('wisata_id')
                ->references('id')
                ->on('wisatas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating_reviews');
    }
};
