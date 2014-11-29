<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuratJalanDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surat_jalan_detail', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('unit');
            $table->integer('id_barang')->unsigned();
            $table->foreign('id_barang')->references('id')->on('barang');
            $table->integer('id_surat_jalan')->unsigned();
            $table->foreign('id_surat_jalan')->references('id')->on('surat_jalan');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('surat_jalan_detail');
	}

}
