<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBiaya extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('biaya', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('nominal');
			$table->text('keterangan');
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
		Schema::drop('biaya');
	}

}
