<?php

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
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('/{bar}', 'MedicinesList@showSubbar')->name('nav');
Route::get('/{bar}/{link}', 'MedicinesList@showLink')->name('sub_Nav');

