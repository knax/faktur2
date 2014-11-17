<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BarangTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Barang::create([
                'nama'                   => $faker->numerify('Besi ###'),
                'harga'                  => $index . '000',
                'batas_keuntungan_bawah' => $index + 3,
                'batas_keuntungan_atas'  => $index + 5
            ]);

            Stok::create([
                'id_barang' => $index,
                'stok'      => $index . '00',
                'tanggal'   => (new DateTime())->format('Y-m-d')
            ]);
        }
    }

}