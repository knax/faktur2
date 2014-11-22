<?php

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('BarangTableSeeder');
        $this->call('PelangganTableSeeder');
        $this->call('PenjualanTableSeeder');
        $this->call('PembelianTableSeeder');
        $this->call('BiayaTableSeeder');
        $this->call('KomisiTableSeeder');
        $this->call('KeuntunganTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('KaryawanTableSeeder');
    }

}
