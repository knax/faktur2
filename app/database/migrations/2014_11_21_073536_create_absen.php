<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAbsen extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kehadiran')->default('tidak');
            $table->date('tanggal');
            $table->integer('id_karyawan')->unsigned();
            $table->foreign('id_karyawan')->references('id')->on('karyawan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('absen');
    }

}
