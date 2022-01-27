<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_pemilik')->unsigned();
            $table->bigInteger('id_kategori')->unsigned();
            $table->string('nama', 50);
            $table->string('slug');
            $table->text('keterangan');
            $table->string('gambar');
            $table->integer('stok');
            $table->integer('harga');
            $table->string('tipe');
            $table->timestamps();

            $table->foreign('id_pemilik')->references('id')->on('owners')->onDelete('CASCADE');
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alats');
    }
}
