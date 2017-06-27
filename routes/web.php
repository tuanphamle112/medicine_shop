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

Route::get('/', 'Frontend\HomeController@index')->name('welcome');
Route::get('/search', 'Frontend\HomeController@search')->name('frontend.search');
Route::get('/search/json', 'Frontend\HomeController@jsonSearch');

Route::get('/redirect/{providerName}', 'Frontend\SocialAuthController@redirect')->name('auth.social');
Route::get('/callback/{providerName}', 'Frontend\SocialAuthController@callback');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
    Route::get('/', 'Admin\AdminController@index');
    Route::match(['get', 'post'], 'setup', 'Admin\AdminController@setup')->name('admin.setup');
    Route::get('json/getStaticstics', 'Admin\AdminController@getStaticstics');

    Route::resource('users', 'Admin\UserController');

    Route::resource('category', 'Admin\CategoryController');
    Route::get('category/{id}/create', 'Admin\CategoryController@subCreate')->name('category.subCreate');

    Route::resource('medicine', 'Admin\MedicineController');

    Route::resource('comment', 'Admin\CommentController');

    Route::resource('rate', 'Admin\RateController');

    Route::resource('request', 'Admin\RequestMedicineController');
});

Route::group(['middleware' => 'isLogin'], function(){
    // Prescription
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

    // Mark Medicine
    Route::get('/mark-medicine', 'Frontend\HomeController@markMedicineIndex')
        ->name('frontend.mark-medicine.index');
    Route::delete('/mark-medicine/{id}', 'Frontend\HomeController@markMedicineDestroy')
        ->name('frontend.mark-medicine.destroy');

    Route::get('detail/add-to-box', 'Frontend\DetailMedicinesController@addToBox')->name('add_to_box');

    // Add comment
    Route::post('/comment/send/data', 'Frontend\DetailMedicinesController@addComment');

    Route::post('/user/edit', 'Frontend\UserProfilesController@editUserInformations')
        ->name('frontend.user.edit.personal');
    Route::post('/user/edit/upload', 'Frontend\UserProfilesController@showUploadAvatar')
        ->name('show_upload_avatar');
    Route::post('/user/change-password', 'Frontend\UserProfilesController@userChangePassword')
        ->name('user_change_password');
    Route::get('/user/profile', 'Frontend\UserProfilesController@index')
        ->name('frontend.user.profiles');

        
    Route::get('/request-prescription', 'Frontend\RequestPrescriptionController@requestIndex')
    	->name('request-prescription.index');
    Route::get('/request-prescription/add-new', 'Frontend\RequestPrescriptionController@requestAddnew')
    	->name('request-prescription.addnew');
    Route::post('/request-prescription/add-new', 'Frontend\RequestPrescriptionController@requestStore')
    	->name('request-prescription.store');
    Route::get('/request-prescription/json/detail', 'Frontend\RequestPrescriptionController@jsonDetail');

});

Route::post('detail/{id}', 'Frontend\DetailMedicinesController@avg')->name('avg');

Route::post('/contact/sendemail', 'Frontend\HomeController@sendEmail')->name('frontend.sendemail');

// Comment
Route::get('/comment/json/getList', 'Frontend\DetailMedicinesController@jsonCommentList');

// Detail medicine
Route::get('detail/{id}/{name}', 'Frontend\DetailMedicinesController@index')->name('detail');

// Route::get('/user/{user_id}/{user_name}', 'Frontend\UserProfilesController@profileDiffUser')
    // ->name('frontend.user.different.profiles');

Route::get('/{parent}', 'Frontend\MedicinesListController@showParentCategories')->name('nav');
Route::get('/{parentLink}/{subLink}', 'Frontend\MedicinesListController@showSubCategory')->name('sub_Nav');
