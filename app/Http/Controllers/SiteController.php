<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('welcome', ['products' => $products]);
    }
}
