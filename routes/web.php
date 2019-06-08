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

Route::get('/', 'ProductsController@index')->name('index');

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

