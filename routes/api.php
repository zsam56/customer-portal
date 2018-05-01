<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/clients', 'ClientsController', [
	'except' => ['edit', 'show', 'store']
]);

Route::resource('/locations', 'LocationsController', [
	'except' => ['edit', 'show', 'store', 'create', 'destroy']
]);

Route::resource('/industries', 'IndustriesController', [
	'except' => ['edit', 'show', 'store', 'create', 'destroy']
]);

Route::resource('/products', 'ProductsController', [
	'except' => ['edit', 'show', 'store', 'create', 'destroy']
]);

Route::get('/client/{id}', function($id) {
	return App\Client::find($id);
});

Route::get('/location/{id}', function($id) {
	return App\Location::find($id);
});

//Search functionality
Route::get('/search/location/{loc_id}/industry/{ind_id}/product/{prod_id}' , function($loc_id, $ind_id, $prod_id) {
    //Intersect the lists of all clients belonging to the three atttributes
    if ($loc_id != 0) {
        $location = App\Location::find($loc_id);
    }
    if ($prod_id != 0) {
        $product = App\Product::find($prod_id);
    }

    if ($location != null) {
        $location_clients = collect($location->clients);
    }

    if ($ind_id != 0) {
        $industry = App\Industry::find($ind_id);
        $location_clients->filter(function($value, $key) {
            return $value->industry == $industry->name;
        });
    }
    
    $clients = [];

    foreach ($location_clients as $client) {
        array_push($clients, $client);
    }

    return $clients;
});

Route::get('/client/{id}/profile', function ($id) {
    $client = App\Client::find($id);
    $location = App\Location::find($client->location_id);

    $response_obj = new stdClass();
    $response_obj->client = $client;
    $response_obj->location = $location;
    return json_encode($response_obj);
});

// Route::get('/location', function() {
// 	return ['shit'];
// 	// return App\Location::find(1);
// 	// return App\Location::where('name', 'Houston');
// });




