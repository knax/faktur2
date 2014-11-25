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
			$table->string('nama_penitip');
			$table->string('nama_barang');
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
		Schema::drop('barang_titipan');
	}

}
