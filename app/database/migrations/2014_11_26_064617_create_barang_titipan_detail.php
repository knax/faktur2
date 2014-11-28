<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarangTitipanDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('barang_titipan_detail', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nama');
            $table->integer('unit')->unsigned();
            $table->integer('id_barang_titipan')->unsigned();
            $table->foreign('id_barang_titipan')->references('id')->on('barang_titipan');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('barang_titipan_detail');
	}

}
