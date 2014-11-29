<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuratJalan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surat_jalan', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nama');
            $table->string('penulis');
            $table->string('alamat');
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
		Schema::drop('surat_jalan');
	}

}
