<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHutang extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hutang', function (Blueprint $table) {
            $table->increments('id');
            $table->date('jatuh_tempo')->nullable();
            $table->bigInteger('sisa_hutang')->unsigned();
            $table->integer('id_pembelian')->unsigned();
            $table->foreign('id_pembelian')->references('id')->on('pembelian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hutang');
    }

}
