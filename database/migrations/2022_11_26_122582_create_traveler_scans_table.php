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
        Schema::create('traveler_scans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('traveler_id');
            $table->unsignedBigInteger('scan_point_id');
            $table->timestamps();

            //relationship with travelers table
            $table
                ->foreign('traveler_id')
                ->references('id')
                ->on('travelers');

            //relationship with scan_points table
            $table
                ->foreign('scan_point_id')
                ->references('id')
                ->on('scan_points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traveler_scans');
    }
};
