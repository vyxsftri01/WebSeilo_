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
        Schema::create('activity_medias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_activities');
            $table->foreign('id_activities')->references('id')->on('activities');
            $table->unsignedBigInteger('id_media');
            $table->foreign('id_media')->references('id')->on('media');
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
        Schema::dropIfExists('activity_medias');
    }
};
