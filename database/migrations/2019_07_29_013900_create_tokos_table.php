<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('foto_toko');
            $table->string('slug');
            $table->string('keterangan');
            $table->bigInteger('id_pemilik')->unsigned();
            $table->timestamps();

            $table->foreign('id_pemilik')->references('id')->on('owners')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokos');
    }
}
