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

Route::get('/', function () { return view('welcome'); })->name('welcome');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function(){
    Route::get('/', 'Admin\AdminController@index');
    Route::resource('users', 'Admin\UserController');

    Route::resource('category', 'Admin\CategoryController');
    Route::get('category/{id}/create', 'Admin\CategoryController@subCreate')->name('category.subCreate');
});

Route::get('/{bar}', 'MedicinesList@showSubbar')->name('nav');
Route::get('/{bar}/{link}', 'MedicinesList@showLink')->name('sub_Nav');
