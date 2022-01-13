<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderContent;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateOrderPut;

class OrderController extends Controller
{
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
        $order = Order::find($id);
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
        return view('backend.orders.update', ['order' => $order]);
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
            $order->user->name = $request->name;
            $order->user->lastname = $request->lastname;
            $order->subtotal = $request->subtotal;
            $order->shipping = $request->shipping;
            $order->total = $request->total;
            $order->payment_status = $request->payment_status;
            $order->general_status = $request->general_status;
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
