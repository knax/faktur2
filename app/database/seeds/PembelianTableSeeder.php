<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PembelianTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Pembelian::create([
                'tanggal'       => $faker->date(),
                'sudah_dibayar' => $faker->boolean(),
                'id_pelanggan'  => $index
            ]);
            foreach (range(1, 3) as $indexInside) {
                PembelianDetail::create([
                    'harga'        => $faker->numberBetween(1000, 10000),
                    'unit'         => $faker->numberBetween(10, 100),
                    'id_pembelian' => $index,
                    'id_barang'    => $faker->numberBetween(1, 10)
                ]);
            }
        }

    }

}