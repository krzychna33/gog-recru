<html>
<head>
    <title>e-commerce app</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="header-content">
            <div class="header-logo-container">
                <a href="{{route('index')}}"><h1 class="header-logo">E-commerce app</h1></a>
            </div>
            <div class="header-links">
                @if (Auth::check())
                    <a href="{{route('logout')}}" class="header-link">Logout</a>
                @else
                    <p><a href="{{route('cart.index')}}" class="header-link">Your cart</a></p>
                    <p><a href="{{route('login')}}" class="header-link">Login</a></p>
                @endif
            </div>
        </div>
    </div>
    <div class="content">
        @yield('content')
    </div>
</div>

<script src="js/app.js"></script>
</body>
</html>