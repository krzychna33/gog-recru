<html>
<head>

</head>
<body>
<h1>Hi!</h1>
<p>We have some games for you ;)</p>

@foreach ($keys as $key)
    <div>
        <h3>{{$key['title']}}</h3>
        <p><strong>Key:</strong> {{$key['key']}}</p>
    </div>
@endforeach

<div>
    <p>E-commerce app | krzychnadev.me</p>
</div>
</body>
</html>