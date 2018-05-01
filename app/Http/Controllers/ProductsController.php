<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Product;

class ProductsController extends Controller
{
    public function index() {
        return response(Product::all()->jsonSerialize(), Response::HTTP_OK);
    }
}
