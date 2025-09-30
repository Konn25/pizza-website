@extends('layouts.app')

@section('title', 'Users')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Users</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
                Users
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card card-primary card-outline">
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th colspan="2">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{route('users.edit',$user)}}"><button type="button" class="btn btn-outline-primary"><i class="fas fa-pen"></i></button></a></td>
                            <form method="POST" action="{{route('users.destroy', $user->id)}}">
                                @method('DELETE')
                                @csrf
                                <td><button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button></td>
                            </form>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection