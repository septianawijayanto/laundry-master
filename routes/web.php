<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('beranda');
});

route::group(['middleware' => 'auth'], function () {

    route::get('beranda', 'Beranda_controller@index');

    route::get('paket-laundry', 'Paket_controller@index');

    route::get('paket-laundry/add', 'Paket_controller@add');
    route::post('paket-laundry/add', 'Paket_controller@store');

    route::get('paket-laundry/{id}', 'Paket_controller@edit');
    route::put('paket-laundry/{id}', 'Paket_controller@update');
    route::get('paket-laundry/{id}/delete', 'Paket_controller@delete');

    // customer
    route::get('customer', 'Customer_controller@index');

    route::get('customer/add', 'Customer_controller@add');
    route::post('customer/add', 'Customer_controller@store');

    route::get('customer/{id}', 'Customer_controller@edit');
    route::put('customer/{id}', 'Customer_controller@update');

    route::get('customer/{id}/delete', 'Customer_controller@delete');

    // manage karyawan
    route::get('karyawan', 'Karyawan_controller@index');

    route::get('karyawan/add', 'Karyawan_controller@add');
    route::post('karyawan/add', 'Karyawan_controller@store');

    route::get('karyawan/{id}', 'Karyawan_controller@edit');
    route::put('karyawan/{id}', 'Karyawan_controller@update');
    route::get('karyawan/{id}/delete', 'Karyawan_controller@delete');

    // master stts pesanan
    route::get('status-pesanan', 'Status_pesanan_controller@index');

    route::get('status-pesanan/add', 'Status_pesanan_controller@add');
    route::post('status-pesanan/add', 'Status_pesanan_controller@store');

    route::get('status-pesanan/{id}', 'Status_pesanan_controller@edit');
    route::put('status-pesanan/{id}', 'Status_pesanan_controller@update');

    route::get('status-pesanan/{id}/delete', 'Status_pesanan_controller@delete');

    //master status pembayaran
    route::get('status-pembayaran', 'Status_pembayaran_controller@index');

    route::get('status-pembayaran/add', 'Status_pembayaran_controller@add');
    route::post('status-pembayaran/add', 'Status_pembayaran_controller@store');

    route::get('status-pembayaran/{id}', 'Status_pembayaran_controller@edit');
    route::put('status-pembayaran/{id}', 'Status_pembayaran_controller@update');

    route::get('status-pembayaran/{id}/delete', 'Status_pembayaran_controller@delete');

    //Transaksi Pesanan
    Route::get('transaksi-pesanan', 'TransaksiPesananController@index');

    Route::get('transaksi-pesanan/periode', 'TransaksiPesananController@periode');

    route::get('transaksi-pesanan/add', 'TransaksiPesananController@add');
    route::post('transaksi-pesanan/add', 'TransaksiPesananController@store');

    route::get('transaksi-pesanan/{id}', 'TransaksiPesananController@edit');
    route::put('transaksi-pesanan/{id}', 'TransaksiPesananController@update');

    route::get('transaksi-pesanan/{id}/delete', 'TransaksiPesananController@delete');

    //naikkan Status Pesanan
    route::get('transaksi-pesanan/naikkan-status/{id}', 'TransaksiPesananController@naikkan_status');
    //naikkan Status Pembayaran
    route::get('transaksi-pesanan/naikkan-status-pembayaran/{id}', 'TransaksiPesananController@naikkan_status_pembayaran');
    //cetak invoice
    Route::get('transaksi-pesanan/print/{id}', 'TransaksiPesananController@export');

    Route::get('/laporan', 'LaporanController@index');
    Route::get('/laporan/laporanpdf', 'LaporanController@laporanpdf');
    Route::get('/laporan/laporanpdfall', 'LaporanController@laporanpdfall');


    // route nama usaha
    Route::get('nama-usaha', 'Profile_controller@index');
    Route::put('nama-usaha', 'Profile_controller@update');
});
Auth::routes();

Route::get('/home', function () {
    return redirect('beranda');
});

route::get('keluar', function () {
    Auth::logout();
    return redirect('login');
});
