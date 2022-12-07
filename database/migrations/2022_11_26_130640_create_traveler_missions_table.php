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
        Schema::create('traveler_missions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('traveler_id');
            $table->unsignedBigInteger('mission_id');
            $table->timestamps();
            
            //relationship with travelers table
            $table
                ->foreign('traveler_id')
                ->references('id')
                ->on('travelers');

            //relationship with missions table
            $table
                ->foreign('mission_id')
                ->references('id')
                ->on('missions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traveler_missions');
    }
};
