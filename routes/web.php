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



 //Route::get('/', [\App\Http\Controllers\ProductController::class, 'getdata'])->name('home') ->middleware(['verify.shopify']);


Route::get('/', [\App\Http\Controllers\SettingsController::class, 'Connect'])
    ->middleware(['verify.shopify'])
    ->name('home');

Route::any('/connect', [\App\Http\Controllers\SettingsController::class, 'ConnectWith'])
    ->middleware(['verify.shopify'])
    ->name('connect');

Route::any('/update', [\App\Http\Controllers\SettingsController::class, 'UpdateAPI'])
    ->middleware(['verify.shopify'])
    ->name('update.api');

Route::any('/status/update', [\App\Http\Controllers\SettingsController::class, 'StatusUpdate'])
    ->middleware(['verify.shopify'])
    ->name('status.api');


//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/settings', function () {



});



Route::get('/getproductmanually', [\App\Http\Controllers\ProductController::class, 'getproductmanually'])->middleware(['verify.shopify']);

Route::get('/getproducts', [\App\Http\Controllers\ProductController::class, 'getalldata']);




Route::get('/getproducts/{id}', [\App\Http\Controllers\ProductController::class, 'getid']);
