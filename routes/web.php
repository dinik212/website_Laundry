<?php

use App\Models\Weight;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\PakaianController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\TransaksiController;

//halaman utama
Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/inputpekerja', function () {
    return view('inputpekerja');
});

//halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/manager/homepage', [PemesananController::class, 'index']);
Route::get('/pegawai/homepage', [PemesananController::class, 'index']);
Route::get('/pelanggan/homepage', [PemesananController::class, 'index'])->name('pelanggan.homepage');


Route::post('/pemesanan', [PemesananController::class, 'store']);
Route::post('pemesanan/{id}/confirm', [PemesananController::class, 'confirm'])->name('pemesanan.confirm');
Route::get('/pemesanan/create', [PemesananController::class, 'create'])->name('pemesanan.create');
Route::post('/pemesanan/store', [PemesananController::class, 'store'])->name('pemesanan.store');
Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::get('transaksi/create/{pemesanan_id}', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::get('/transaksi/cek/{id}', [TransaksiController::class, 'cekTransaksi'])->name('pelanggan.cekTransaksi');



Route::get('/pakaian', [PakaianController::class, 'index'])->name('pakaian.index');
Route::get('/pakaian/create', [PakaianController::class, 'create'])->name('pakaian.create');
Route::post('/pakaian', [PakaianController::class, 'store'])->name('pakaian.store');
Route::get('/pakaian/{id}/edit', [PakaianController::class, 'edit'])->name('pakaian.edit');
Route::put('/pakaian/{id}', [PakaianController::class, 'update'])->name('pakaian.update');
Route::delete('/pakaian/{id}', [PakaianController::class, 'destroy'])->name('pakaian.destroy');
Route::get('/pelanggan/cekpakaian', [PakaianController::class, 'cekPakaian'])->name('cek.pakaian');
Route::get('/pelanggan/searchpakaian', [PakaianController::class, 'searchPakaian'])->name('search.pakaian');

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('/pegawai/{pegawai}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
Route::put('transaksi/{transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
Route::post('transaksi/confirm/{id}', [TransaksiController::class, 'confirm'])->name('transaksi.confirm');
Route::get('transaksi/print/{id}', [TransaksiController::class, 'print'])->name('transaksi.print');
Route::get('/pegawai/hasil', [TransaksiController::class, 'index'])->name('pegawai.hasil');
Route::post('/transaksi/bayar/{id}', [TransaksiController::class, 'bayar'])->name('transaksi.bayar');

Route::get('/pelanggan/rpesanan', [PemesananController::class, 'riwayat'])->name('riwayat_pesanan');
Route::get('/pelanggan/rtransaksi', [TransaksiController::class, 'riwayat'])->name('pelanggan.rtransaksi');


Route::get('/weights', [WeightController::class, 'index'])->name('weights.index');



