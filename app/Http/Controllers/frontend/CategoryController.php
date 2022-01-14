<?php

namespace App\Http\Controllers\frontend;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    const PAGINATION = "1";
    /**
     *show all categories
     */
    public function index()
    {
        $categories = Category::paginate(self::PAGINATION);
        //$rel = Product::orderBy('created_at', 'DESC')->take(9)->get()->toArray();
        $rel = DB::table('products')
        ->join('stocks', 'products.id', '=', 'stocks.product_id')
        ->select('products.*', 'stocks.*')
        ->where('stocks.quantity', '>', '0')
        ->orderBy('products.created_at', 'DESC')
        ->take(9)
        ->get()
        ->toArray();
        $related = (array_chunk($rel, 3, true));
        return view('frontend.show-categories', ['categories' => $categories, 'related' => $related]);
    }

    /**
     *show all products of one category ordered by newest
     */
    public function show($id)
    {
        $title = 'All products by category';
        $products = Product::where('category_id', '=', $id)->orderBy('created_at', 'desc')->paginate(self::PAGINATION);
        return view('frontend.show-products', ['products' => $products, 'title'=> $title]);
    }
}
