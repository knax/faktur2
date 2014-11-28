<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BarangTitipanTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            BarangTitipan::create([
                'nama_penitip' => $faker->name
            ]);
            foreach (range(1, 3) as $indexInside) {
                BarangTitipanDetail::create([
                    'nama'              => $faker->word,
                    'unit'              => $faker->numberBetween(10, 100),
                    'id_barang_titipan' => $index,
                ]);
            }
        }
    }

}