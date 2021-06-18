<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Addresses;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::join('products', 'orders.product_id', '=', 'products.id')
        ->join('payments', 'orders.payment_id', '=', 'payments.razorpay_id')
        ->where('orders.user_id', Auth::user()->id)
        ->select('products.*', 'orders.*', 'payments.*', 'orders.id as order_id', 'payments.amount as paid_amount')
        ->get();
        return view('user.orders', ['orders' => $orders]);
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
        $orders = Order::join('products', 'orders.product_id', '=', 'products.id')
        ->join('payments', 'orders.payment_id', '=', 'payments.razorpay_id')
        ->where('orders.id', $id)
        ->where('orders.user_id', Auth::user()->id)
        ->select('products.*', 'orders.*', 'payments.*', 'orders.id as order_id', 'payments.amount as paid_amount')
        ->get();
        
        foreach ($orders as $order) {
            $add_id = $order->address_id;
        }
        $addresses = Addresses::where('id', $add_id)->get();
        
        return view('user.orders-track', ['orders' => $orders, 'addresses' => $addresses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
