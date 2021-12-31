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
     *show all products of one category ordered by newest
     */
    public function show($id)
    {
        $title = 'All products by category';
        $categories = Category::limit(6)->orderBy('created_at', 'desc')->get(); 
        $products = Product::where('category_id', '=', $id)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.show-products', ['products' => $products, 'categories' => $categories, 'title'=> $title]);
    }
}
