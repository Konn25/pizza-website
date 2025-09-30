@extends('layouts.app')

@section('title', 'Teszt Server')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Teszt  Server</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
                Servers
            </li>
            <li class="breadcrumb-item active">#{{ 0 }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card card-primary card-outline">
            <div class="card-body">
                TEST
            </div>
        </div>
    </div>

</div>
@endsection