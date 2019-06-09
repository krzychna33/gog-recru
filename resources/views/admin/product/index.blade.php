@extends ('layouts.app')

@section('content')

    <div class="products-list-admin">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="products-list-admin-header">
            <h2>Admin Product Management Panel</h2>
            <a href="{{route('product.create')}}" class="btn btn-primary">New product</a>
        </div>
        <table class="table table-striped table-responsive-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Update</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{route('product.edit', $product->id)}}" class="btn badge-primary">Update</a>
                    </td>
                    <td>
                        <form action="{{route('product.destroy', $product->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn badge-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection