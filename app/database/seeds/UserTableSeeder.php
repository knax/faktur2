<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        User::create([
            'username' => 'knax',
            'password' => Hash::make('standar'),
            'tipe'     => 'super_admin'
        ]);

        foreach (range(1, 10) as $index) {
            User::create([
                'username' => $faker->userName,
                'password' => Hash::make('marketing'),
                'tipe'     => 'marketing'
            ]);
        }

        foreach (range(1, 10) as $index) {
            User::create([
                'username' => $faker->userName,
                'password' => Hash::make('kasir'),
                'tipe'     => 'kasir'
            ]);
        }
    }

}