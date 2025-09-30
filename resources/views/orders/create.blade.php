<form action="{{route('orders.store')}}" method="POST">
    @csrf
    <input type="email" name="email">
    <input type="text" name="name">
    <button type="submit">Submit</button>
</form>
@if(session('success'))
    <div style="color: green">
        {{session('success')}}
    </div>
@endif
@if ($errors->any())
<div style="color: red">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li> 
        @endforeach

    </ul>
</div>
@endif