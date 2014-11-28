<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipeUserHakAkses extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipe_user_hak_akses', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('id_tipe_user')->unsigned();
            $table->integer('id_hak_akses')->unsigned();
            $table->foreign('id_tipe_user')->references('id')->on('tipe_user');
            $table->foreign('id_hak_akses')->references('id')->on('hak_akses');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tipe_user_hak_akses');
	}

}
