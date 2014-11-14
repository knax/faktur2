<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUang extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('uang', function(Blueprint $table)
		{
			$table->increments('id');
            $table->bigInteger('kas');
            $table->bigInteger('saldo_bank');
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
		Schema::drop('uang');
	}

}
