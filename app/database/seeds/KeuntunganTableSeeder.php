<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class KeuntunganTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        Keuntungan::create([
            'kas' => 10000000,
            'saldo_bank' => 20000000,
            'tanggal' => (new DateTime())->modify('-1 days')->format('Y-m-d')
        ]);

    }

}