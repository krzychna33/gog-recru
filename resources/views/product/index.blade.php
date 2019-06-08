@extends ('layouts.app')

@section('content')

    <div class="products-list">
        @foreach($products as $product)
            <div class="card products-item">
                <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <p class="card-text">{{$product->price}} $</p>
                    <a href="#" class="btn btn-info">Add to cart</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection