<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\BukutamuController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/aboutus',[HomeController::class, 'aboutus']);

Route::resource('/tamu', TamuController::class);
Route::resource('/jabatan', JabatanController::class);
Route::resource('/buku_tamu', BukutamuController::class);

Route::get('/buku_tamupdf', [BukuTamuController::class, 'buku_tamuPDF']);
Route::get('buku_tamucsv',[BukuTamuController::class,'buku_tamucsv']);