<?php

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
    return redirect('login');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth','admin','verified'])->group(function(){
        Route::get('/dashboard','DashboardController@index')->name('dashboard');
        Route::resource('category', 'CategoryController');
        Route::resource('item', 'ItemController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('location', 'LocationController');
        Route::resource('order', 'OrderController');
        Route::get('download-attachment/{id}', 'OrderController@download_attachment')->name('download-attachment');
    });