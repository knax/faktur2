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
        Route::get('', ['as' => 'barang.list', 'uses' => 'BarangController@barang']);
        Route::post('', ['as' => 'barang.buat', 'uses' => 'BarangController@buatBarang']);
        Route::get('tambah', ['as' => 'barang.buat.form', 'uses' => 'BarangController@buatBarangForm']);
        Route::get('{id}', ['as' => 'barang.detail', 'uses' => 'BarangController@detail']);
        Route::get('{id}/edit', ['as' => 'barang.edit', 'uses' => 'BarangController@editBarangForm']);
        Route::post('{id}', ['as' => 'barang.edit.form', 'uses' => 'BarangController@editBarang']);
    });
    Route::get('', ['as' => 'barang.stok', 'uses' => 'BarangController@index']);
});

Route::group(['prefix' => 'kasir'], function () {
    Route::get('', ['as' => 'kasir.list', 'uses' => 'KasirController@daftarPenjualanBelumDibayar']);
    Route::get('{id}', ['as' => 'kasir.bayar.form', 'uses' => 'KasirController@bayarForm']);
    Route::post('{id}', ['as' => 'kasir.bayar', 'uses' => 'KasirController@bayar']);
});

Route::group(['prefix' => 'marketing'], function () {
    Route::get('jual', ['as' => 'marketing.jual.form', 'uses' => 'MarketingController@jualBarangForm']);
    Route::post('jual', ['as' => 'marketing.jual', 'uses' => 'MarketingController@jualBarang']);
});

Route::group(['prefix' => 'pelanggan'], function () {
    Route::get('', ['as' => 'pelanggan.list', 'uses' => 'PelangganController@listPelanggan']);
    Route::get('{id}', ['as' => 'pelanggan.bayar.form', 'uses' => 'PelangganController@bayarPiutangForm']);
    Route::post('{id}', ['as' => 'pelanggan.bayar', 'uses' => 'PelangganController@bayarPiutang']);
});

Route::group(['prefix' => 'keuntungan'], function () {
    Route::get('', ['as' => 'keuntungan.laporan', 'uses' => 'KeuntunganController@index']);
    Route::get('barang_terjual', ['as' => 'keuntungan.barang_terjual', 'uses' => 'KeuntunganController@barangTerjual']);
});

Route::group(['prefix' => 'pembelian'], function () {
    Route::get('', ['as' => 'pembelian.beli.form', 'uses' => 'PembelianController@beliBarangForm']);
    Route::post('', ['as' => 'pembelian.beli', 'uses' => 'PembelianController@beliBarang']);
});

Route::group(['prefix' => 'hutang'], function () {
    Route::get('', ['as' => 'hutang.list', 'uses' => 'HutangController@listHutang']);
    Route::get('{id}', ['as' => 'hutang.bayar.form', 'uses' => 'HutangController@bayarHutangForm']);
    Route::post('{id}', ['as' => 'hutang.bayar', 'uses' => 'HutangController@bayarHutang']);
});

Route::group(['prefix' => 'biaya'], function () {
    Route::get('', ['as' => 'biaya.list', 'uses' => 'BiayaController@index']);
    Route::post('', ['as' => 'biaya.buat', 'uses' => 'BiayaController@buatBiaya']);
    Route::get('komisi', ['as' => 'biaya.komisi.buat.form', 'uses' => 'BiayaController@buatKomisiForm']);
    Route::post('komisi', ['as' => 'biaya.komisi.buat', 'uses' => 'BiayaController@buatKomisi']);
});

Route::group(['prefix' => 'login'], function () {
    Route::get('', ['as' => 'auth.login.form', 'uses' => 'LoginController@loginForm']);
    Route::post('', ['as' => 'auth.login', 'uses' => 'LoginController@login']);
});

Route::get('logout', ['as' => 'auth.logout', 'uses' => 'LoginController@logout']);

Route::group(['prefix' => 'karyawan'], function () {
    Route::get('', ['as' => 'karyawan.list', 'uses' => 'KaryawanController@listKaryawan']);
    Route::group(['prefix' => 'absen'], function () {
        Route::get('', ['as' => 'karyawan.absen.list', 'uses' => 'KaryawanController@listAbsen']);
        Route::get('{id}/{tipe}/{tanggal}', ['as' => 'karyawan.absen', 'uses' => 'KaryawanController@absenKaryawan'])
             ->where('id', '[0-9]+')
             ->where('tipe', '(masuk|setengah_hari|tidak)');
    });
    Route::get('lemburan', ['as' => 'karyawan.lemburan.list', 'uses' => 'KaryawanController@listLemburan']);
    Route::get('{id}', ['as' => 'karyawan.detail', 'uses' => 'KaryawanController@detailKaryawan']);
});

Route::group(['prefix' => 'barang_titipan'], function () {
    Route::get('', ['as' => 'barang_titipan.list', 'uses' => 'BarangTitipanController@listBarangTitipan']);
    Route::get('buat', ['as' => 'barang_titipan.buat.form', 'uses' => 'BarangTitipanController@buatBarangTitipanForm']);
    Route::post('', ['as' => 'barang_titipan.buat', 'uses' => 'BarangTitipanController@buatBarangTitipan']);
    Route::get('{id}', ['as' => 'barang_titipan.kurangi.form', 'uses' => 'BarangTitipanController@kurangiBarangTitipanForm']);
    Route::post('{id}', ['as' => 'barang_titipan.kurangi', 'uses' => 'BarangTitipanController@kurangiBarangTitipan']);
});

Route::get('test', function () {
});
