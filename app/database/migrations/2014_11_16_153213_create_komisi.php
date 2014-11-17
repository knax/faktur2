<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKomisi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('komisi', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tipe', 255);
            $table->bigInteger('nominal')->unsigned();
            $table->date('tanggal');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('komisi');
	}

}
