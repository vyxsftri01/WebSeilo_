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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');
            $table->unsignedBigInteger('id_media');
            $table->foreign('id_media')->references('id')->on('media');
            $table->string('nisn', 15);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['perempuan', 'laki-laki']);
            $table->text('alamat');
            $table->string('no_hp', 15);
            $table->string('nama_sekolah', 100);
            $table->string('jurusan', 100);
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
        Schema::dropIfExists('profiles');
    }
};
