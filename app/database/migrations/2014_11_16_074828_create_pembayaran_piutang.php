<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePembayaranPiutang extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_piutang', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('jumlah')->unsigned();
            $table->string('metode', 255);
            $table->date('tanggal');
            $table->integer('id_piutang')->unsigned();
            $table->foreign('id_piutang')->references('id')->on('piutang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pembayaran_piutang');
    }

}
