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


// Afisare pagina de start
Route::get('/', 'HomeController@index'); //cos


Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index');
    Route::resource('produse', 'ProduseController');
    Route::resource('users', 'UserController');
    Route::resource('tasks', 'TaskController');
    Route::resource('events', 'EventController');
    Route::get('participa/{id}', 'EventController@participa');
Route::get('cart', 'ProductsController@cart'); //cos
Route::get('add-to-cart/{id}', 'ProductsController@addToCart');//adaug in cos
Route::patch('update-cart', 'ProductsController@update'); //modific cos
Route::delete('remove-from-cart', 'ProductsController@remove');//sterg din cos
});
