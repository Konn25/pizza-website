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
    <div class="col-3">
        <div class="card card-primary card-outline">
            <div class="card-header">
                {{$order->id}}
            </div>
            <div class="card-body">
                    <div> Name: {{$order->name}} </div>
                    <div> Phone: {{$order->phone}} </div>
                    <div> Email: {{$order->email}} </div>
                    <div> 
                        <ul>
                            @foreach($order->orderPizzas as $orderPizza)
                            <li>
                                <div> {{$orderPizza->pizza->name}} </div>
                                <div> Extra toppings🥓: </div>
                                <ul>
                                    @foreach($orderPizza->orderPizzaToppings as $orderPizzaTopping)
                                    <li>{{$orderPizzaTopping->topping->name}}</li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                            
                        </ul>
                        
                    </div>
            </div>
            <div class="card-footer">
                    
            </div>
        </div>
        
    </div>
    @endforeach

</div>
@endsection