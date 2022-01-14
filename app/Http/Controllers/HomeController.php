<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','check.rol']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all()->count();
        $products = Product::all()->count();
        $categories = Category::all()->count();
        $from = Carbon::now()->startOfMonth();
        $to = Carbon::now();
        $orders = Order::whereBetween('created_at', [$from, $to])->get()->count();
        return view('home', ['users' => $users, 'products' => $products, 'orders' => $orders, 'categories' => $categories]);
    }
}
