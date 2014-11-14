<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PenjualanTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Penjualan::create([
                'tanggal'       => $faker->date(),
                'sudah_dibayar' => $faker->boolean(),
                'id_pelanggan'  => $index
            ]);
            foreach (range(1, 3) as $indexInside) {
                PenjualanDetail::create([
                    'harga'        => $faker->numberBetween(1000, 10000),
                    'unit'         => $faker->numberBetween(10, 100),
                    'id_penjualan' => $index,
                    'id_barang'    => $faker->numberBetween(1, 10)
                ]);
            }
        }

    }

}