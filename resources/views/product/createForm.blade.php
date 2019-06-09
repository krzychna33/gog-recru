@extends ('layouts.app')

@section('content')

    <div class="form-container">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <h2>Create new product</h2>
        <form method="POST" action="{{route('product.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" class="form-control" name="title" id="title">
            </div>

            <div class="form-group">
                <label for="price">Price: </label>
                <input type="text" class="form-control" name="price" id="price">
            </div>

            <input type="submit" class="btn btn-primary" value="Add new product">
        </form>
    </div>

@endsection