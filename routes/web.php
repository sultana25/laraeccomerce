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

Route::get('/','WelcomeController@index');
Route::get('/category','WelcomeController@category');
Route::get('/product-details','WelcomeController@productDetails');
Route::get('/contact','WelcomeController@contact');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

//category info

Route::get('/category/add','CategoryController@createCategory');
Route::post('/category/save','CategoryController@storeCategory');
Route::get('/category/manage','CategoryController@manageCategory');
Route::get('/category/edit/{id}','CategoryController@editCategory');
Route::post('/category/update','CategoryController@updateCategory');
Route::get('/category/delete/{id}','CategoryController@deleteCategory');

//manufacturer info

Route::get('/manufacturer/add','ManufacturerController@createManufacturer');
Route::post('/manufacturer/save','ManufacturerController@storeManufacturer');
Route::get('/manufacturercategory/manage','ManufacturerController@manageManufacturer');
Route::get('/manufacturer/edit/{id}','ManufacturerController@editManufacturer');
Route::post('/manufacturer/update','ManufacturerController@updateManufacturer');
Route::get('/manufacturer/delete/{id}','ManufacturerController@deleteManufacturer');