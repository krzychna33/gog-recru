@extends ('layouts.app')

@section('content')
    <div>
        <h2>Your cart</h2>
        @if (Session::has('cart'))
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Remove One</th>
                </tr>
                </thead>
                <tbody>
                @foreach($storedItems as $item)
                    <tr>
                        <td>{{$item['product']->title}}</td>
                        <td>{{$item['quantity']}}</td>
                        <td>{{$item['value']}} $</td>
                        <td>
                            <form action="{{route('cart.removeProduct', $item['product']->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">-</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="cart-footer">
                <div class="cart-summary">
                    <p>Total items: <strong>{{$totalItems}}</strong></p>
                    <p>Total price: <strong>{{$totalPrice}} $</strong></p>
                </div>
                <div>
                    <form action="{{route('cart.processOrder')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Your e-mail adress:</label>
                            <input type="text" name="email" id="email" class="form-control"/>
                        </div>
                        <button class="btn btn-primary">Process your order</button>
                    </form>
                </div>
            </div>
        @else
            <div class="alert alert-danger">Your cart is empty!</div>
        @endif

    </div>
@endsection