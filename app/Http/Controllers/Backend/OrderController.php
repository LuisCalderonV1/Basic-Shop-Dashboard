<?php

namespace App\Http\Controllers\Backend;

use App\Order;
use App\OrderContent;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateOrderPut;
use App\Http\Controllers\Controller;

class OrderController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('backend.orders.index',['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $orderContent = OrderContent::where('order_id', '=', $order->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('backend.orders.show', ['order' => $order, 'orderContent' => $orderContent]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $orderContent = OrderContent::where('order_id', '=', $order->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('backend.orders.update', ['order' => $order, 'orderContent' => $orderContent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderPut $request, $id)
    {
        $validated = $request->validated();

        if($validated){
            $order = Order::findOrFail($id);
            $order->user->name = sanitize($request->name);
            $order->user->lastname = sanitize($request->lastname);
            $order->subtotal = sanitize($request->subtotal);
            $order->shipping = sanitize($request->shipping);
            $order->total = sanitize($request->total);
            $order->payment_status = sanitize($request->payment_status);
            $order->general_status = sanitize($request->general_status);
            $order->save();

            return redirect('orders')->withStatus('Data Has Been updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);   

        $orderContents= OrderContent::where('order_id','=', $order->id)->delete();
        
        $order->delete();

        return redirect('orders')->withStatus('Data Has Been deleted');
    }
}
