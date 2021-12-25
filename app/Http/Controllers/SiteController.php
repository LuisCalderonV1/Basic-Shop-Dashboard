<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $products = Product::limit(9)->get();
        $categories = Category::limit(9)->get();
        return view('welcome', ['products' => $products, 'categories' => $categories]);
    }
}
