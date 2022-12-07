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
        Schema::create('wisata_missions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mission_id');
            $table->unsignedBigInteger('wisata_id');
            $table->timestamps();

            //relationship with missions table
            $table
                ->foreign('mission_id')
                ->references('id')
                ->on('missions');

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
        Schema::dropIfExists('wisata_missions');
    }
};
