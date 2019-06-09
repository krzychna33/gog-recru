@extends ('layouts.app')

@section('content')
    <div>
        <h1>Success! We have just send game keys to your email: {{$email}}</h1>
        <a href="{{route('index')}}" class="btn btn-primary">Go back</a>
    </div>
@endsection