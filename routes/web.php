<?php

use App\Http\Controllers\PropertyController;
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

Route::controller(PropertyController::class)->group(function () {
    Route::get('', 'index')->name('home');
    Route::get('/properties/{id}', 'show')->name('properties.show')->where('id', '[0-9]+');
});
