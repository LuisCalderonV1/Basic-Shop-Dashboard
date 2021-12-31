<?php

namespace App\Http\Controllers\frontend;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Show one product by $id
     */
    public function show($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $rel = Product::take(9)->get()->toArray();
        $related = (array_chunk($rel, 2, true));
        return view('frontend/show-product', ['product' => $product, 'categories' => $categories, 'related' => $related]);
    }

    /**
     * Show all products by creted_at
     */
    public function show_new()
    {
        $title = 'New Products';
        $categories = Category::all();
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('frontend/show-products', ['products' => $products, 'categories' => $categories, 'title' => $title]);
    }

    /**
     * Show all offers
     */
    public function show_offers()
    {
        $title = 'All offers';
        $categories = Category::all();
        //$products = Product::orderBy('created_at', 'desc')->paginate(10);
        $products = Product::where('discount', '>', 0)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend/show-products', ['products' => $products, 'categories' => $categories, 'title' => $title]);
    }

}
