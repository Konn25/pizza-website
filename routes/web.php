<?php

use App\Http\Controllers\web\ToppingsController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\PizzaController;
use App\Http\Controllers\Web\UserController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('users',UserController::class);
Route::resource('orders',OrderController::class);
Route::resource('pizzas',PizzaController::class);
Route::resource('toppings',ToppingsController::class);
Route::post('/order/{order}/nextStation', [OrderController::class, 'nextStation'])->name('orders.nextStation');
Route::post('/order/{order}/decreaseStation', [OrderController::class, 'decreaseStation'])->name('orders.decreaseStation');




Route::get('teszt',function(){
    $order = Order::find(4);
    $order->load('pizzas.toppings');
    return $order;
});

/*
Route::resource('orders',OrderController::class);*/
