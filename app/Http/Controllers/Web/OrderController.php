<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.orders.index',['orders' => Order::with(['orderPizzas','orderPizzas.pizza','orderPizzas.orderPizzaToppings','orderPizzas.orderPizzaToppings.topping', 'orderPizzas.orderStatus'])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('pages.orders.edit', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function nextStation(Order $order)
    {

        foreach ($order->orderPizzas as $pizza) {
            $nextStatus = $pizza->status < 6 ? $pizza->status + 1 : 6;
            $pizza->update([
                'status' => $nextStatus
            ]);
        }

        return redirect()->back()->with('success', 'Status has been moved to the next step.');
    }


    public function decreaseStation(Order $order)
{
    foreach ($order->orderPizzas as $pizza) {
        $prevStatus = $pizza->status > 1 ? $pizza->status - 1 : 1;
        $pizza->update([
            'status' => $prevStatus
        ]);
    }

    return redirect()->back()
        ->with('success', 'Status has been moved to the previous step.');
}

}
