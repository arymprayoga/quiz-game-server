<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal', function (Blueprint $table) {
            $table->id();
            $table->string('idKelas');
            $table->unsignedBigInteger('serverID');
            $table->string('namaGuru');
            $table->string('soal');
            $table->string('jawabanA');
            $table->string('jawabanB');
            $table->string('jawabanC');
            $table->string('jawabanD');
            $table->string('jawabanBenar');
            $table->string('jenisSoal');
            $table->timestamps();

            $table->foreign('serverID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal');
    }
}
