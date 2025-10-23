<style>
    .waiting-status {
        background: linear-gradient(135deg, #e47900, #ffb300);
        color: #212529;
        font-weight: 600;
        border: 1px solid #e6a800;
        box-shadow: 0 2px 6px rgba(255, 193, 7, 0.4);
    }

    .card {
        min-height: 550px;
        max-height: 550px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        overflow-y: auto;
    }

    .card-footer {
        background-color: #fff;
        border-top: 1px solid #e9ecef;
    }
</style>

@extends('layouts.app')

@section('title', 'Orders')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Orders</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
                Orders
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    @foreach($orders as $order)
    @php
        $finalPrice = 0; 
    @endphp
    
    <div class="col-3">
        <div class="card card-primary card-outline">
            <div class="card-header">
                {{ $order->id }}
    
                @if ($order->orderPizzas && $order->orderPizzas->count() > 0)
                    @php
                        $pizzaNames = $order->orderPizzas->pluck('pizza.name')->toArray();
                        $firstPizza = $pizzaNames[0];
                        $sameCount = collect($pizzaNames)->filter(fn($name) => $name === $firstPizza)->count();
                        $uniqueCount = collect($pizzaNames)->unique()->count();
                    @endphp
    
                    @if ($uniqueCount === 1)
                        - {{ $sameCount }}x {{ $firstPizza }}
                    @else
                        - {{ $firstPizza }} + more...
                    @endif
    
                @else
                    - Missing pizza
                @endif
    
                <span class="badge waiting-status text-dark px-3 py-2 fs-6 shadow-sm">
                    🟡 Waiting for approval
                </span>
            </div>
    
            <div class="card-body bg-light rounded shadow-sm p-4">
                <div class="mb-3">
                    <h5 class="fw-bold mb-2"><i class="fas fa-user me-2"></i>Customer Details</h5>
                    <p class="mb-1"><strong>Name:</strong> {{ $order->name }}</p>
                    <p class="mb-1"><strong>Phone:</strong> {{ $order->phone }}</p>
                    <p class="mb-0"><strong>Email:</strong> {{ $order->email }}</p>
                </div>
    
                <hr class="my-3">

                <div>
                    <h5 class="fw-bold mb-3"><i class="fas fa-pizza-slice me-2 text-danger"></i>Pizzas</h5>
                    <ul class="list-group list-group-flush">
                        @foreach($order->orderPizzas as $orderPizza)
                            @php
                                $finalPrice += $orderPizza->pizza->price;
                            @endphp
                            <li class="list-group-item bg-white rounded mb-2 shadow-sm border">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $orderPizza->pizza->name }}</strong> <span class="text-muted">L size</span>
                                    </div>
                                    <span class="fw-bold text-success">{{ $orderPizza->pizza->price }} $</span>
                                </div>
    
                                @if (sizeof($orderPizza->orderPizzaToppings) > 0)
                                    <div class="mt-2 ps-3">
                                        <div class="fw-semibold text-secondary mb-1">Extra toppings 🥓:</div>
                                        <ul class="small text-muted mb-0">
                                            @foreach($orderPizza->orderPizzaToppings as $orderPizzaTopping)
                                                @php
                                                    $finalPrice += $orderPizzaTopping->topping->price;
                                                @endphp
                                                <li>
                                                    {{ $orderPizzaTopping->topping->name }}
                                                    <span class="text-success">+{{ $orderPizzaTopping->topping->price }} $</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
    
            <div class="card-footer">
                <div class="order-status badge bg-warning text-dark px-3 py-2 rounded-pill mb-3">Awaiting approval</div>
    
                <div class="fw-bold">Total: {{ number_format($finalPrice, 2) }} $</div>
    
                <div class="action-buttons d-flex justify-content-center" style="gap: 10px;">
                    <button type="submit" class="btn btn-outline-success">
                        <i class="fas fa-check"></i>
                    </button>
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    

</div>
@endsection