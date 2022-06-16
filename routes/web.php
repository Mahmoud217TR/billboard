<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [AdvertisementController::class,'index'])->name('billboard');
Route::get('/billboard', [AdvertisementController::class,'index'])->name('billboard');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('advertisement', AdvertisementController::class);

Route::get('/search', [SearchController::class,'indexSearch'])->name('search');