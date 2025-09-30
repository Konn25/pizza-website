<form action="{{route('orders.update',$order->id)}}" method="POST">
    @csrf
    @method('PUT')
    <input type="email" name="email" value="{{old('email',$order->email)}}">
    <input type="text" name="name" value="{{old('name', $order->name)}}">
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