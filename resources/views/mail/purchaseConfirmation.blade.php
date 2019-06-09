<html>
<head>

</head>
<body>
<h1>Welcome! </h1>
<p>We are sending you your new game keys!</p>

@foreach ($keys as $key)
    <h3>{{$key['title']}}</h3>
    <p>Key: {{$key['key']}}</p>
@endforeach

<div>
    <p>E-commerce app @krzychnadev.me</p>
</div>
</body>
</html>