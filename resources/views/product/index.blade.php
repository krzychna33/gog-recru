@extends ('layouts.app')

@section('content')
    <div>
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div class="products-list">
        @foreach($products as $product)
            <div class="card products-item">
                <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <p class="card-text">{{$product->price}} $</p>
                    <a href="{{route('product.addToCart', $product->id)}}" class="btn btn-info">Add to cart</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection