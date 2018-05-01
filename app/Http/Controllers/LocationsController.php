<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Location;

class LocationsController extends Controller
{
    /**
     * Show the location page.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    	$location = \App\Location::find($id);
        return view('location', ['name' => $location->name]);
    }

    public function index() {
        return response(Location::all()->jsonSerialize(), Response::HTTP_OK);
    }
}
