<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Industry;

class IndustriesController extends Controller
{
    public function index() {
        return response(Industry::all()->jsonSerialize(), Response::HTTP_OK);
    }
}
