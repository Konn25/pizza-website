<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use Illuminate\Http\Request;

// ! TODO Megcsinálni a listára való átírányítást üzenetekkel !!!!!
// TODO keshből visszaszedni az adatokat input old metódus (Erhard megjegyzés)
// TODO megcsinálni az update gombot !!
// TODO API reg/login middleware 
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders/index',['name' => 'SAdmin', 'orders' => $orders]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('orders/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderStoreRequest $request)
    {
        //
        Order::create($request->validated());
        //return redirect()->route('orders.create')->with(['success' => 'Order created']);
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
        return $order;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
        return view('orders/edit', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderUpdateRequest $request, Order $order)
    {
        //
        $order->update($request->validated());
        return redirect()->route('orders.edit',$order)->with(['success' => 'Order updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
        $order->delete();
        return redirect()->route('orders.index');
    }
}
