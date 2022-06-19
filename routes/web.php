<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
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
Route::get('/search', [SearchController::class,'indexSearch'])->name('search');
Route::get('/searchtag', [SearchController::class,'tagSearch'])->name('search.tag');
Route::get('/uncategorized/advertisements', [AdvertisementController::class,'uncategorized'])->name('uncategorized.advertisements');

Route::resource('advertisement', AdvertisementController::class);
Route::resource('category', CategoryController::class);
Route::resource('tag', TagController::class);
Route::resource('profile', ProfileController::class)->only('show','edit','update');