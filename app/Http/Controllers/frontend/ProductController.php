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
}
