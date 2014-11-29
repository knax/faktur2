<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarangTitipan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('barang_titipan', function(Blueprint $table)
		{
			$table->increments('id');
            $table->boolean('diambilSemua')->default(false);
			$table->integer('id_penjualan')->unsigned();
            $table->foreign('id_penjualan')->references('id')->on('penjualan');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('barang_titipan');
	}

}
