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

// Route::get('/', function () {
//     return view('layouts/app');
// });

// Route::get('location/{id}', 'LocationController@show');

// Route::get('client/{id}', 'ClientController@show');

// Route::get('clients/location={location}&industry={industry}&product={product}', 'ClientsController@constructSearch');

// Route::get('search/', 'ClientsController@constructSearch');

// Route::get('search/', function() {
// 	return view('search');
// });

Route::get('/{any}', 'AppController@index')->where('any', '.*');

Route::get('location', function () {
	return ['fuck'];
});
