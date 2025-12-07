@extends('layouts.app')

@section('content')
<form method="POST" action="/login">
    @csrf

    <div>
        <label>Email</label>
        <input type="email" name="email" required>
        @error('email') <p>{{ $message }}</p> @enderror
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password" required>
        @error('password') <p>{{ $message }}</p> @enderror
    </div>

    <button type="submit">Login</button>
</form>
@endsection
