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
        Route::get('', function () {
            return View::make('stok/barang/index');
        });
        Route::get('tambah', function () {
            return View::make('stok/barang/tambah');
        });
        Route::get('{id}/edit', function() {
            return View::make('stok/barang/edit');
        });
    });
    Route::get('', function () {
        return View::make('stok/index');
    });
});
Route::group(['prefix' => 'penjualan'], function () {
    Route::group(['prefix' => 'kasir'], function () {
        Route::get('', function () {
            return View::make('penjualan/kasir/index');
        });
        Route::get('{id}', function() {
            return View::make('penjualan/kasir/pembayaran');
        });
    });
    Route::get('marketing', function () {
        return View::make('penjualan/marketing/index');
    });
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
