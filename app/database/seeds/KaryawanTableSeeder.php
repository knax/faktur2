<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class KaryawanTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Karyawan::create([
                'nama' => $faker->name
            ]);

            foreach (range(1, 10) as $indexDalam) {
                $hariIni = new DateTime();
                $hariTujuan = $hariIni->modify('+1 day')->modify('-' . $indexDalam . ' days');
                Absen::create([
                    'kehadiran' => $faker->randomElement(['tidak', 'setengah_hari', 'masuk']),
                    'tanggal' => $hariTujuan,
                    'id_karyawan' => $index
                ]);
                Lemburan::create([
                    'detik' => $faker->randomNumber(60, 18000),
                    'uang_makan' => $faker->numberBetween(1000, 10000),
                    'tanggal' => $hariTujuan,
                    'id_karyawan' => $index
                ]);
            }
        }
    }

}