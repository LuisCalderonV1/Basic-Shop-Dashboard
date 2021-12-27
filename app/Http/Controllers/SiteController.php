<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $new_products = Product::limit(6)->orderBy('created_at', 'desc')->get();
        $offers = Product::where('discount', '>', 0)->limit(6)->orderBy('created_at', 'desc')->get();
        $categories = Category::limit(6)->orderBy('created_at', 'desc')->get();

        $total_categories = $categories->count();
        $random_number = rand(1,$total_categories);
        $random_category = Category::find($random_number);
        $last_in_category = Product::where('category_id', '=', $random_category->id)->limit(6)->orderBy('created_at', 'desc')->get();

        return view('welcome', ['products' => $new_products, 'categories' => $categories, 
        'offers' => $offers , 'last_in_category' => $last_in_category , 'random_category' => $random_category]);
    }
}
