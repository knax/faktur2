<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        User::create([
            'full_name'    => 'Hasta Ragil',
            'username'     => 'knax',
            'password'     => Hash::make('standar'),
            'id_tipe_user' => '1'
        ]);

        foreach (range(1, 10) as $index) {
            User::create([
                'full_name'    => $faker->name,
                'username'     => $faker->userName,
                'password'     => Hash::make('marketing'),
                'id_tipe_user' => '1'
            ]);
        }

        foreach (range(1, 10) as $index) {
            User::create([
                'username'     => $faker->userName,
                'password'     => Hash::make('kasir'),
                'id_tipe_user' => '1'
            ]);
        }
    }

}