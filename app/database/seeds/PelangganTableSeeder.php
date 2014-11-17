<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PelangganTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        Pelanggan::create([
            'nama'          => 'Bukan Pelanggan Tetap',
            'alamat'        => '-',
            'nomor_telepon' => '-',
            'piutang'       => '0',
            'keterangan'    => '-'
        ]);
        foreach (range(2, 10) as $index) {
            Pelanggan::create([
                'nama'          => $faker->name,
                'alamat'        => $faker->address,
                'nomor_telepon' => $faker->phoneNumber,
                'keterangan'    => $faker->sentence()
            ]);
            Piutang::create([
                'id_pelanggan' => $index,
                'sisa_piutang' => ($index - 1) . '00000',
                'tanggal'      => (new DateTime())->format('Y-m-d')
            ]);
        }

    }

}