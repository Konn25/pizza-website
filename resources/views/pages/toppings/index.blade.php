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
    @foreach ($toppings as $topping)
    <div class="col-3">
        
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">{{$topping->name}}</h3>
            </div>
            <div class="card-body">
                <img src="{{$topping->url}}" alt="topping" width="250" height="250">
                <br>
                {{$topping->description}}
            </div>
            <div class="card-footer d-flex justify-content-center" style="gap: 10px;">
                <td><a href="{{route('toppings.edit',$topping)}}"><button type="button" class="btn btn-outline-primary"><i class="fas fa-pen"></i></button></a></td>
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection