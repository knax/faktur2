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
        Route::get('', 'KasirController@daftarPenjualanBelumDibayar');
        Route::get('{id}', 'KasirController@bayarForm');
        Route::post('{id}', 'KasirController@bayar');
    });
    Route::get('marketing', 'MarketingController@jualBarangForm');
    Route::post('marketing', 'MarketingController@jualBarang');
});
Route::group(['prefix' => 'pelanggan'], function () {
    Route::get('', 'PelangganController@listPelanggan');
    Route::get('{id}', 'PelangganController@bayarPiutangForm');
    Route::post('{id}', 'PelangganController@bayarPiutang');
});
Route::group(['prefix' => 'keuntungan'], function () {
    Route::get('barang_terjual', 'KeuntunganController@barangTerjual');
    Route::post('barang_terjual', 'KeuntunganController@barangTerjual');
    Route::get('', 'KeuntunganController@index');
});
Route::group(['prefix' => 'pembelian'], function () {
    Route::get('', 'PembelianController@beliBarangForm');
    Route::post('', 'PembelianController@beliBarang');
    Route::group(['prefix' => 'hutang'], function () {
        Route::get('', 'HutangController@listHutang');
        Route::get('{id}', 'HutangController@bayarHutangForm');
        Route::post('{id}', 'HutangController@bayarHutang');
    });
});
Route::group(['prefix' => 'biaya'], function () {
    Route::get('', 'BiayaController@index');
    Route::post('', 'BiayaController@buatBiaya');
    Route::get('komisi', 'BiayaController@buatKomisiForm');
    Route::post('komisi', 'BiayaController@buatKomisi');
});