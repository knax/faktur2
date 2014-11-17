<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePiutang extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('piutang', function(Blueprint $table)
		{
            $table->increments('id');
            $table->date('tanggal')->nullable();
            $table->date('jatuh_tempo')->nullable();
            $table->bigInteger('sisa_piutang')->unsigned();
            $table->integer('id_pelanggan')->unsigned();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('piutang');
	}

}
