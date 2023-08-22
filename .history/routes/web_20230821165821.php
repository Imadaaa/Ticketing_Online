<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\KampusController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisTiketController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MetodePembayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// landing page
Route::get('/', [LandingPageController::class, 'index'])->name('landing-page.index');

// acara
Route::group(['prefix' => 'acara'], function() {
    Route::get('/{slug}', [AcaraController::class, 'landingPageShow'])->name('landing-page.acara.show');
});

// kategori
Route::group(['prefix' => 'kategori'], function() {
    Route::get('/', [KategoriController::class, 'landingPageIndex'])->name('landing-page.kategori.index');
});

// auth
Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::post('/logout', [AuthController::class, 'doLogout'])->name('logout');
Route::group(['prefix' => 'register'], function() {
    Route::get('/', [AuthController::class, 'getRegister'])->name('register');
    Route::post('/', [AuthController::class, 'doRegister']);
    Route::get('/verifikasi/{token}', [AuthController::class, 'doVerifikasi']);
});

// dashboard
Route::group(['prefix' => 'dashboard'], function() {
    // pages
    Route::get('/', [DashboardController::class, 'getIndex'])->name('dashboard.index'); 

    // kategori
    Route::group(['prefix' => 'kategori'], function() {
        Route::get('/datatable-json', [KategoriController::class, 'datatableJson'])->name('dashboard.kategori.datatable-json');
    });
    Route::resource('kategori', KategoriController::class, ['as' => 'dashboard'])->except('show');

    // lokasi
    Route::group(['prefix' => 'lokasi'], function() {
        Route::get('/datatable-json', [LokasiController::class, 'datatableJson'])->name('dashboard.lokasi.datatable-json');
    });
    Route::resource('lokasi', LokasiController::class, ['as' => 'dashboard'])->except('show');

    // kampus
    Route::group(['prefix' => 'kampus'], function() {
        Route::get('/datatable-json', [KampusController::class, 'datatableJson'])->name('dashboard.kampus.datatable-json');
    });
    Route::resource('kampus', KampusController::class, ['as' => 'dashboard'])->except('show')->parameters(['kampus' => 'kampus']);

    // metode pembayaran
    Route::group(['prefix' => 'metode-pembayaran'], function() {
        Route::get('/datatable-json', [MetodePembayaranController::class, 'datatableJson'])->name('dashboard.metode-pembayaran.datatable-json');
    });
    Route::resource('metode-pembayaran', MetodePembayaranController::class, ['as' => 'dashboard'])->except('show');

    // user
    Route::group(['prefix' => 'user'], function() {
        Route::get('/datatable-json', [UsersController::class, 'datatableJson'])->name('dashboard.user.datatable-json');
    });
    Route::resource('user', UsersController::class, ['as' => 'dashboard'])->only(['index', 'destroy']);

    // acara
    Route::group(['prefix' => 'acara'], function() {
        Route::get('/datatable-json', [AcaraController::class, 'datatableJson'])->name('dashboard.acara.datatable-json');

        Route::get('/{acara}/jenis-tiket', [JenisTiketController::class, 'index'])->name('dashboard.jenis-tiket.index');
        Route::post('/{acara}/jenis-tiket', [JenisTiketController::class, 'store'])->name('dashboard.jenis-tiket.store');
        
        Route::get('/{acara}/tiket/datatable-json', [TiketController::class, 'datatableJson'])->name('dashboard.tiket.datatable-json');
        Route::post('/{acara}/tiket', [TiketController::class, 'store'])->name('dashboard.tiket.store');
        Route::delete('/tiket/{tiket}', [TiketController::class, 'destroy'])->name('dashboard.tiket.destroy');
    });
    Route::resource('acara', AcaraController::class, ['as' => 'dashboard'])->except('show');
});
