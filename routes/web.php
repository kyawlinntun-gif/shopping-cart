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

Route::get('/', 'ProductsController@index');
Route::get('/add-to-cart/{id}', 'ProductsController@addToCart');
Route::get('/cart/show', 'ProductsController@show');
Route::get('/cart/reduce/{id}', 'ProductsController@reduce');
Route::get('/cart/remove/{id}', 'ProductsController@remove');
Route::get('/checkout', 'ProductsController@checkout');
Route::post('/checkout', 'ProductsController@payCheckout');

// Route::group(['middleware' => 'guest'], function () {
//     Auth::routes(['logout' => false]); 
// });

Auth::routes();

Route::resource('/profile', 'User\ProfilesController');

