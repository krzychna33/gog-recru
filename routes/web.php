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

Route::get('/', 'HomeController@index')->name('index');
Route::get('add-to-cart/{id}', 'ProductsController@addToCart')->name('product.addToCart');
Route::get('cart', 'CartController@getCart')->name('cart.index');
Route::delete('cart/remove-item/{id}', 'CartController@removeProduct')->name('cart.removeProduct');
Route::post('cart/process-order', 'CartController@processOrder')->name('cart.processOrder');

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth'
], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('new-product', 'ProductsController@create')->name('product.create');
    Route::post('store-product', 'ProductsController@store')->name('product.store');
    Route::delete('delete-product/{id}', 'ProductsController@destroy')->name('product.destroy');
    Route::get('edit-product/{id}', 'ProductsController@edit')->name('product.edit');
    Route::patch('update-product/{id}', 'ProductsController@update')->name('product.update');
});


Auth::routes(['register' => false]);

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

