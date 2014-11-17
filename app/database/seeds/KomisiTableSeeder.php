<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class KomisiTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Komisi::create([
                'tipe'    => $faker->randomElement(['tunai', 'transfer']),
                'nominal' => $faker->numberBetween(10000, 100000),
                'tanggal' => (new DateTime())->format('Y-m-d')
            ]);
        }
    }

}