<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStok extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stok', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('id_barang')->unsigned();
            $table->integer('stok')->unsigned();
            $table->date('tanggal');
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
		Schema::drop('stok');
	}

}
