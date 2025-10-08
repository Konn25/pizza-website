@extends('layouts.app')

@section('title', $pizza->name)

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">{{$pizza->name}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
                <a href="{{route('pizzas.index')}}">Pizzas</a>
            </li>
            <li class="breadcrumb-item active">
                {{$pizza->name}}
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <img src="{{asset($pizza->url)}}" class="card-img-top" alt="pizza" style="object-fit: cover; height: 350px;">
            <div class="card-body text-center">
                <h4 class="card-title fw-bold">{{ $pizza->name }}</h4>
                <p class="card-text text-muted">{{ $pizza->description }}</p>
                <p class="card-text fw-semibold fs-5">$ {{ $pizza->price }}</p>
                <div class="d-flex justify-content-center" style="gap: 10px">
                    <button class="btn btn-success btn-lg">Edit</button>
                    <button class="btn btn-danger btn-lg">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection