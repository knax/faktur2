<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BiayaTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Biaya::create([
                'nominal'    => $faker->numberBetween(10000, 100000),
                'keterangan' => $faker->text(),
                'tanggal'    => (new DateTime())->modify('-' . $index - 1 . ' days')->format('Y-m-d')
            ]);
        }
    }

}