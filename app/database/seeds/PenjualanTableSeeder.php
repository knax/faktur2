<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PenjualanTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $sudahDibayar = $faker->boolean();
            $tanggalPenjualan = (new DateTime())->format('Y-m-d');
            $tanggalPembayaran = null;
            if( $sudahDibayar ) {
                $date = DateTime::createFromFormat('Y-m-d', $tanggalPenjualan);
                $tanggalPembayaran = $date->modify('+' . $index . ' day')->format('Y-m-d');
            }
            Penjualan::create([
                'tanggal_penjualan'  => $tanggalPenjualan,
                'sudah_dibayar'      => $sudahDibayar,
                'metode_pembayaran'  => $faker->randomElement(['tunai', 'transfer', 'merchant', 'hutang']),
                'tanggal_pembayaran' => $tanggalPembayaran,
                'id_pelanggan'       => $index,
                'diskon'             => 0,
                'ongkir'             => $faker->numberBetween(1000, 9000)
            ]);

            $penjualanDetail = [];

            foreach (range(1, 3) as $indexInside) {
                $penjualanDetail[$index][$indexInside] = PenjualanDetail::create([
                    'harga'        => $faker->numberBetween(1000, 10000),
                    'unit'         => $faker->numberBetween(10, 100),
                    'id_penjualan' => $index,
                    'id_barang'    => $faker->numberBetween(1, 10)
                ]);
            }
            if( $sudahDibayar ) {
                $barangTitipan = BarangTitipan::create([
                    'id_penjualan' => $index,
                    'diambilSemua' => false
                ]);
                foreach ($penjualanDetail[$index] as $detail) {
                    BarangTitipanDetail::create([
                        'id_barang_titipan' => $barangTitipan->id,
                        'id_barang'         => $detail->barang->id,
                        'unit'              => $detail->unit
                    ]);
                }
            }
        }

    }

}