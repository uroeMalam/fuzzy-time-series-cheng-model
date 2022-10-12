<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\UtamaController;
use Illuminate\Support\Facades\Artisan;


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
// Create Storage Link For CPanel
// after upload to Cpanel Remember to RUN This route before you launch the web
Route::get('/foo', function () {
    Artisan::call('storage:link');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    // Artisan::call('migrate:fresh --seed');
    return redirect()->route('kabupaten');
});

// route login
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    
    // perhitungan
    Route::get('/perhitungan',[PerhitunganController::class, 'index'])->name('perhitungan');
    
    // grafik perhitungan
    Route::get('/grafik',[GrafikController::class, 'index'])->name('grafik');
    Route::get('/grafik/data-table',[GrafikController::class, 'DataTable'])->name('grafik_dataTable');

    // pengiriman
    Route::get('/pengiriman',[PengirimanController::class, 'index'])->name('pengiriman');
    Route::delete('/pengiriman',[PengirimanController::class, 'destroy'])->name('pengiriman_destroy');
    Route::get('/pengiriman/tambah', [PengirimanController::class, 'create'])->name('pengiriman_create');
    Route::post('/pengiriman/simpan',[PengirimanController::class, 'store'])->name('pengiriman-simpan');
    Route::get('/pengiriman/edit/{id}',[PengirimanController::class, 'edit'])->name('pengiriman-edit');
    Route::post('/pengiriman/update',[PengirimanController::class, 'update'])->name('pengiriman-update');
    Route::post('/pengiriman/data-table',[PengirimanController::class, 'DataTable'])->name('pengiriman_dataTable');

    // evnet
    // Route::get('/event',[EventController::class, 'index'])->name('event');
    
    
});

// dashboard depan
// Route::get('/', [AlumniController::class, 'index'])->name('alumni');
  
