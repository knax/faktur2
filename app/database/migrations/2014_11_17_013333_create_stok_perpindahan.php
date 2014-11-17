<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStokPerpindahan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stok_perpindahan', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('id_stok')->unsigned();
            $table->integer('unit');
            $table->foreign('id_stok')->references('id')->on('stok');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stok_perpindahan');
	}

}
