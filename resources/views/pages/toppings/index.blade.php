@extends('layouts.app')

@section('title', 'Extra toppings')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Extra toppings</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
                Extra toppings
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col">
        @foreach ($toppings as $topping)
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">{{$topping->name}}</h3>
            </div>
            <div class="card-body">
                <img src="{{$topping->url}}" alt="topping" width="250" height="250">
                <br>
                {{$topping->description}}
            </div>
            </div>
        @endforeach
    </div>

</div>
@endsection