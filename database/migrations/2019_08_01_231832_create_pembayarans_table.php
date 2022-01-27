<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_transaksi',12);
            $table->bigInteger('id_penyewa')->unsigned();
            // $table->bigInteger('id_pemilik')->unsigned();
            $table->bigInteger('id_alat')->unsigned()->nullable();
            $table->integer('qty')->unsigned();
            $table->integer('total')->unsigned();
            $table->string('tgl_pinjam', 11);
            $table->string('tgl_kembali', 11);
            $table->integer('durasi')->unsigned();
            $table->string('bukti_user')->nullable();
            $table->string('bukti_admin')->nullable();
            $table->char('status', 1)->default(0);
            $table->timestamps();

            $table->foreign('id_penyewa')->references('id')->on('users')->onDelete('CASCADE');
            // $table->foreign('id_pemilik')->references('id')->on('owners')->onDelete('CASCADE');
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
        Schema::dropIfExists('pembayarans');
    }
}
