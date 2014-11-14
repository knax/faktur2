<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePembelianDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pembelian_detail', function(Blueprint $table)
		{
            $table->increments('id');
			$table->bigInteger('harga')->unsigned();
            $table->integer('unit')->unsigned();
            $table->integer('id_pembelian')->unsigned();
            $table->integer('id_barang')->unsigned();
            $table->foreign('id_pembelian')->references('id')->on('pembelian');
            $table->foreign('id_barang')->references('id')->on('barang');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pembelian_detail');
	}

}
