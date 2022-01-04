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
        $category = $product->category;
        $rel = $category->products->take(9)->toArray();
        $related = (array_chunk($rel, 1, true));
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

    /**
     * Show all products by search
     */
    public function search(Request $request)
    {
        $title = 'Your search results';
        $categories = Category::all();
        $name = $request->name;
        $products = Product::where('name', 'LIKE', "%$name%")->paginate(10);
        return view('frontend/show-products', ['products' => $products, 'categories' => $categories, 'title' => $title]);
    }

}
