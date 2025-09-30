@extends('layouts.app')

@section('title', $user->name)

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">{{$user->name}}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
                <a href="{{route('users.index')}}">Users</a>
            </li>
            <li class="breadcrumb-item active">
                {{$user->name}}
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card card-primary card-outline">
            <div class="card-body">
                Name: {{$user->name}} <br>
                Email: {{$user->email}} <br>
                Phone: {{$user->phone}}
            </div>
        </div>
    </div>

</div>
@endsection