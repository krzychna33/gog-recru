@extends ('layouts.app')

@section('content')

    <div class="form-container">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <h2>Update product</h2>
        <form method="POST" action="{{route('product.update', $product->id)}}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" class="form-control" name="title" id="title" value="{{$product->title}}">
            </div>

            <div class="form-group">
                <label for="price">Price: </label>
                <input type="text" class="form-control" name="price" id="price" value="{{$product->price}}">
            </div>

            <input type="submit" class="btn btn-primary" value="Update product">
        </form>
    </div>

@endsection