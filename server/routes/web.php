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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('/admin/users', 'admin\UsersController', ['except' => ['create', 'show', 'store']]);

Route::namespace('admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/dashboard', 'UsersController', ['except' => ['create', 'show', 'store']]);
    Route::resource('/pictures', 'PicturesController');
    //Route::resource('/contacts-list', 'GeneralController@contactsList');
});

Route::get('/contacts-list', 'admin\GeneralController@contactsList')->prefix('admin')->name('admin.general.contactslist');

Route::post('/change_picture_status', 'admin\AjaxController@changePictureStatus');
Route::post('/delete_picture', 'admin\AjaxController@deletePicture');

//////////////////////////////////////////////////////////////////////////

Route::get('/api/home-photos/{photo_type}', 'PictureController@homeGalleryPhotos');
Route::post('/api/user_contact', 'ContactsController@submitContactForm');
