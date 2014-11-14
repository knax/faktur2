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
            $table->integer('id_pembelian')->unsigned();
			$table->integer('id_barang')->unsigned();
			$table->bigInteger('harga')->unsigned();
            $table->integer('unit')->unsigned();
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
