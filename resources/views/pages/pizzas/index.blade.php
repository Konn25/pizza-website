@extends('layouts.app')

@section('title', 'Pizzas')

@section('breadcrumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Pizzas</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">
                    Pizzas
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            @foreach ($pizzas as $pizza)
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $pizza->name }}</h3>
                    </div>
                    <div class="card-body">
                        <img src="{{ $pizza->url }}" alt="pizza" width="250" height="250">
                        <br>
                        {{ $pizza->description }}
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
