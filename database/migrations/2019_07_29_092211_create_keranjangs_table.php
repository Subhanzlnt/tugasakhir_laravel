<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeranjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_penyewa')->unsigned();
            $table->bigInteger('id_alat')->unsigned()->nullable();
            $table->integer('qty')->unsigned();
            $table->integer('total')->unsigned();
            $table->string('tgl_pinjam')->nullable();
            $table->string('tgl_kembali')->nullable();
            $table->integer('durasi')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('id_penyewa')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('id_alat')->references('id')->on('alats')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjangs');
    }
}
