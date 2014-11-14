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
        $this->call('PembelianTableSeeder');
    }

}
