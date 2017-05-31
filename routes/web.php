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

Route::get('/', 'HomeController@index')->name('welcome');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
    Route::get('/', 'Admin\AdminController@index');
    Route::match(['get', 'post'], 'setup', 'Admin\AdminController@setup')->name('admin.setup');

    Route::resource('users', 'Admin\UserController');

    Route::resource('category', 'Admin\CategoryController');
    Route::get('category/{id}/create', 'Admin\CategoryController@subCreate')->name('category.subCreate');

    Route::resource('medicine', 'Admin\MedicineController');

    Route::resource('comment', 'Admin\CommentController');

    Route::resource('rate', 'Admin\RateController');
});

Route::group(['middleware' => 'isLogin'], function(){
	Route::get('/prescription', 'Frontend\PrescriptionController@index')
		->name('frontend.prescription.index');
	Route::get('/prescription/json/getList', 'Frontend\PrescriptionController@getJsonList');
	Route::delete('/prescription/{id}', 'Frontend\PrescriptionController@destroyPrescription');
	
	Route::get('/prescription/{id}/edit', 'Frontend\PrescriptionController@editPrescription');
	Route::put('/prescription/{id}/edit', 'Frontend\PrescriptionController@updatePrescription')
		->name('frontend.prescription.update');

	Route::get('/prescription/addnew', 'Frontend\PrescriptionController@addNewPrescription')
		->name('frontend.prescription.addnew');
	Route::post('/prescription/addnew', 'Frontend\PrescriptionController@storeNewPrescription')
		->name('frontend.prescription.store');
	Route::get('/prescription/json/searchMedicines', 'Frontend\PrescriptionController@jsonSeachMedicines');
});

// Detail medicine
Route::get('detail/{id}', 'DetailMedicinesController@index')->name('detail');
Route::post('detail/{id}', 'DetailMedicinesController@avg')->name('avg');
Route::post('detail/{id}/edit', 'DetailMedicinesController@editRating')->name('edit_rating');

Route::get('/{bar}', 'MedicinesList@showSubbar')->name('nav');
Route::get('/{bar}/{link}', 'MedicinesList@showLink')->name('sub_Nav');
