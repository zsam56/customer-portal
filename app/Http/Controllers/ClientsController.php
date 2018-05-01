<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Http\Response;

class ClientsController extends Controller
{
    /**
     * Show a client page.
     *
     * @param  int  $id
     * @return Response
     */
    // public function show($id)
    // {
    // 	$client = \App\Client::find($id);
    //     return view('client', ['name' => $client->name]);
    // }

    public function create(Generator $faker)
    {
        $client = new Client();
        $client->save();

        return response($client->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function index() {
        return response(Client::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->save();

        return response(null, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        Client::destroy($id);

        return response(null, Response::HTTP_OK);
    }

    /**
     * Show a client page.
     *
     * @param  int  $id
     * @return Response
     */
    public function constructSearch(/*$location_name, $industry_name, $product_name*/) {
        // return view('client', ['name' => $client->name]);
    }

}
