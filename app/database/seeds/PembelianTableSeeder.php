<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PembelianTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $metodePembayaran = $faker->randomElement(['tunai', 'transfer', 'merchant', 'hutang']);
            $tanggalPembelian = (new DateTime())->format('Y-m-d');
            Pembelian::create([
                'nama_supplier'     => $faker->company,
                'metode_pembayaran' => $metodePembayaran,
                'tanggal_pembelian' => $tanggalPembelian
            ]);
            foreach (range(1, 3) as $indexInside) {
                PembelianDetail::create([
                    'unit'         => $faker->numberBetween(10, 100),
                    'id_pembelian' => $index,
                    'id_barang'    => $faker->numberBetween(1, 10)
                ]);
            }
            if( $metodePembayaran == 'hutang' ) {
                Hutang::create([
                    'jatuh_tempo'  => DateTime::createFromFormat('Y-m-d',
                        $tanggalPembelian)->modify('+10 days')->format('Y-m-d'),
                    'tanggal'      => (new DateTime())->format('Y-m-d'),
                    'sisa_hutang'  => $faker->numberBetween(10000, 100000),
                    'id_pembelian' => $index
                ]);
            }
        }
    }

}