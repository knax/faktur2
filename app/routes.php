<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('', function () {
    return View::make('beranda/index');
});

Route::group(['prefix' => 'stok'], function () {
    Route::group(['prefix' => 'barang'], function () {
        Route::get('', 'BarangController@barang');
        Route::post('', 'BarangController@buatBarang');
        Route::get('tambah', 'BarangController@buatBarangForm');
        Route::get('{id}', 'BarangController@detail');
        Route::post('{id}', 'BarangController@editBarang');
        Route::get('{id}/edit', 'BarangController@editBarangForm');
    });
    Route::get('', 'BarangController@index');
});
Route::group(['prefix' => 'penjualan'], function () {
    Route::group(['prefix' => 'kasir'], function () {
        Route::get('', 'KasirController@daftarPembelianBelumDibayar');
        Route::get('{id}', 'KasirController@bayarForm');
        Route::post('{id}', 'KasirController@bayar');
    });
    Route::get('marketing', 'MarketingController@beliBarangForm');
});
Route::group(['prefix' => 'pelanggan'], function () {
    Route::get('', function () {
        return View::make('pelanggan/index');
    });
    Route::get('{id}', function () {
        return View::make('pelanggan/pembayaran');
    });
});
Route::group(['prefix' => 'keuntungan'], function () {
    Route::get('barang_terjual', function () {
        return View::make('keuntungan/barang_terjual/index');
    });
    Route::get('', function () {
        return View::make('keuntungan/index');
    });
});
Route::group(['prefix' => 'pembelian'], function () {
    Route::get('', function () {
        return View::make('pembelian/index');
    });
    Route::group(['prefix' => 'hutang'], function () {
        Route::get('', function () {
            return View::make('pembelian/hutang/index');
        });
        Route::get('{id}', function() {
            return View::make('pembelian/hutang/pembayaran');
        });
    });
});
Route::group(['prefix' => 'biaya'], function () {
    Route::get('', function () {
        return View::make('biaya/index');
    });
    Route::get('komisi', function () {
        return View::make('biaya/komisi/index');
    });
});
