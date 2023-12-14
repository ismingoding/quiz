<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\TransaksiController;

//Route Home
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');


//Route Login & Logout
Route::get('/ ', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//CRUD DATA USER
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/destroy/{id}', [UserController::class, 'destroy']);

//CRUD DATA JENISBARANG
Route::get('/jenisbarang', [JenisBarangController::class, 'index']);
Route::post('/jenisbarang/store', [JenisBarangController::class, 'store']);
Route::post('/jenisbarang/update/{id}', [JenisBarangController::class, 'update']);
Route::get('/jenisbarang/destroy/{id}', [JenisBarangController::class, 'destroy']);

//CRUD DATA BARANG
Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang/store', [BarangController::class, 'store']);
Route::post('/barang/update/{id}', [BarangController::class, 'update']);
Route::get('/barang/destroy/{id}', [BarangController::class, 'destroy']);

//CRUD DATA TRANSAKSI
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/transaksi/store', [TransaksiController::class, 'store']);
Route::post('/transaksi/update/{id}', [TransaksiController::class, 'update']);
Route::get('/transaksi/destroy/{id}', [TransaksiController::class, 'destroy']);

//SETTING DISKON
Route::get('/setdiskon', [DiskonController::class, 'index']);
Route::post('/setdiskon/update/{id}', [DiskonController::class, 'update']);

//SETTING PROFILE
Route::get('/profile', [UserController::class, 'profile']);
Route::post('/profile/updateprofile/{id}', [UserController::class, 'updateprofile']);


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

//Route::get('/', function () {
//    return view('welcome');
//});