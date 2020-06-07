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
    return view('auth/login');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', function () {
    return view('admin/dashboard');
});

//Route::resource('/admin/users', 'admin\UsersController', ['except' => ['create', 'show', 'store']]);

Route::namespace('admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/dashboard', 'UsersController', ['except' => ['create', 'show', 'store']]);
    Route::resource('/pictures', 'PicturesController');
    Route::resource('/product-categories', 'ProductCategoriesController', ['except' => ['show']]);
    Route::resource('/products', 'ProductsController', ['except' => ['show']]);
    Route::resource('/videos', 'VideosController', ['except' => ['show']]);
});

Route::get('/contacts-list', 'admin\GeneralController@contactsList')->prefix('admin')->name('admin.general.contactslist');

Route::post('/change_picture_status', 'admin\AjaxController@changePictureStatus');
Route::post('/delete_picture', 'admin\AjaxController@deletePicture');

Route::post('/change-category-status', 'admin\ProductCategoriesController@changeStatus');

Route::post('/change-video-status', 'admin\VideosController@changeStatus');

//////////////////////////////////////////////////////////////////////////

//++++++++++++++++++++++++++ FRONT-END API SERVICES :: Start ++++++++++++++++++++++++++//
Route::get('/api/home-photos/{photo_type}', 'PictureController@homeGalleryPhotos');
Route::post('/api/user_contact', 'ContactsController@submitContactForm');
Route::get('/api/active-categories', 'StoreController@allActiveCategories');
Route::get('/api/store-products/{cat_slug}', 'StoreController@allActiveProducts');
Route::get('/api/products-details/{prod_slug}', 'StoreController@activeProductDetails');
Route::get('/api/active-videos', 'VideosController@allActiveVideos');
Route::get('/api/video-details/{vid_slug}', 'VideosController@activeVideoDetails');
//++++++++++++++++++++++++++ FRONT-END API SERVICES :: End ++++++++++++++++++++++++++//
