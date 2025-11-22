<style>
    .waiting-status {
        background: linear-gradient(135deg, #67d47a, #67d47a);
        color: #212529;
        font-weight: 600;
        border: 1px solid #be0404;
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

                @php
                    
                $statusClasses = [
                    1 => 'bg-warning text-dark',  
                    2 => 'waiting-status text-dark',   
                    3 => 'bg-info text-white',      
                    4 => 'bg-secondary text-white', 
                    5 => 'bg-indigo text-white',    
                    6 => 'bg-success text-white',   
                ];
            
                $statusIcons = [
                    1 => '🔴',
                    2 => '🟡',
                    3 => '🔵',
                    4 => '🟠',
                    5 => '🟣',
                    6 => '🟢',
                ];


                @endphp

                @foreach($order->orderPizzas as $orderPizza)
                @php
                    $orderStatusName = $orderPizza->orderStatus->name;
                    $orderStatusId = $orderPizza->status;
                @endphp
                @endforeach

            <span class="badge {{ $statusClasses[$orderStatusId] ?? 'bg-secondary' }} px-3 py-2 fs-6 shadow-sm">
                    {{ $statusIcons[$orderStatusId] ?? '⚪' }} {{ $orderStatusName ?? 'Unknown' }}
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
                                        <strong>{{ $orderPizza->pizza->name }}</strong> <span class="text-muted">{{$orderPizza->size}}</span>
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
    
                <div class="fw-bold">Total: {{ number_format($finalPrice, 2) }} $</div>
    
                <div class="action-buttons d-flex justify-content-center" style="gap: 10px;">
                    
                    <form action="{{ route('orders.decreaseStation', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-warning">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                    </form>


                    <form action="{{ route('orders.nextStation', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check"></i></button>
                    </form>
                
                    <form method="POST" action="{{ route('orders.destroy', $order->id) }}" class="m-0 p-0">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    @endforeach
    
</div>
@endsection