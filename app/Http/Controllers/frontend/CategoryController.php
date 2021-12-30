<?php

namespace App\Http\Controllers\frontend;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     *show all categories
     */
    public function index()
    {
        $categories = Category::paginate(10);
        $rel = Product::orderBy('created_at', 'DESC')->take(9)->get()->toArray();
        $related = (array_chunk($rel, 2, true));
        return view('frontend.show-categories', ['categories' => $categories, 'related' => $related]);
    }

    /**
     *show all products of one category
     */
    public function show($id)
    {
        $categories = Category::limit(6)->orderBy('created_at', 'desc')->get(); 
        $products = Product::where('category_id', '=', $id)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.show-products-category', ['products' => $products, 'categories' => $categories]);
    }
}
