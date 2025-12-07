<?php

use App\Http\Controllers\web\ToppingsController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\PizzaController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\AuthController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('users',UserController::class);
Route::resource('orders',OrderController::class);
Route::get('/pizzas', [PizzaController::class, 'publicIndex'])->name('users.pizza');
Route::resource('toppings',ToppingsController::class);
Route::post('/order/{order}/nextStation', [OrderController::class, 'nextStation'])->name('orders.nextStation');
Route::post('/order/{order}/decreaseStation', [OrderController::class, 'decreaseStation'])->name('orders.decreaseStation');

Route::middleware('auth')->group(function () {
    Route::get('/pizzas', [PizzaController::class, 'userIndex'])->name('pizzas.pizza');
});

Route::get('/pizzas', [PizzaController::class, 'publicIndex'])->name('pizzas.pizzas');

Route::middleware(['auth'])->group(function () {
    Route::resource('pizzas', PizzaController::class);
});

Route::get('/guest/pizzas', [PizzaController::class])->name('guest.pizzas');


Route::get('/pizzas-public', [PizzaController::class, 'publicIndex'])->name('guest.pizzas');

Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
});


/*
Route::resource('orders',OrderController::class);*/