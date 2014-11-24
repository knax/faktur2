<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipeUserTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        $tipeUser = TipeUser::create([
            'nama' => 'superadmin'
        ]);

        $routes = Route::getRoutes();

        foreach ($routes as $route) {
            if( $route->methods()[0] != 'GET' ) {
                continue;
            }

            if( $route->parameterNames() ) {
                continue;
            }

            $name = $route->getName();
            if( is_null($name) ) {
                continue;
            }

            $judul = last(explode('.', $name));

            if($judul == 'form') {
                $temp = explode('.', $name);
                $judul = $temp[count($name)];
            }

            HakAkses::create([
                'nama'       => $name,
                'judul'      => $judul,
                'keterangan' => $faker->word
            ]);
        }

        // superadmin dapat mengakses semua halaman
        foreach (HakAkses::all() as $hakAkses) {
            TipeUserHakAkses::create([
                'id_tipe_user' => $tipeUser->id,
                'id_hak_akses' => $hakAkses->id
            ]);
        }
    }

}