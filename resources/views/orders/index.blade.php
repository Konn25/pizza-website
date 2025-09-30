<h1> hello {{ $name }}</h1>
<table border='1px'>
    <tbody>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Created</td>
            <td>Updated</td>
            <td></td>
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->created_at}}</td>
            <td>{{$order->updated_at}}</td>
            <td>
                <form method="POST" action="{{route('orders.destroy', $order->id)}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>
