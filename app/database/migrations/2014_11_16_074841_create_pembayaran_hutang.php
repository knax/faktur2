<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePembayaranHutang extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_hutang', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('jumlah')->unsigned();
            $table->string('metode', 255);
            $table->date('tanggal');
            $table->integer('id_hutang')->unsigned();
            $table->foreign('id_hutang')->references('id')->on('hutang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pembayaran_hutang');
    }

}
