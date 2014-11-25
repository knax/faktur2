<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BarangTitipanTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			BarangTitipan::create([
                'nama_penitip' => $faker->name,
                'nama_barang' => $faker->word,
                'unit' => $faker->numberBetween(1, 100)
			]);
		}
	}

}