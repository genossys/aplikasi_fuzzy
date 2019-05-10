<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SMK N 1 SAWIT</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Coiny" rel="stylesheet">



    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('/js/jquery.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/genosstyle.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet"/>


</head>
<body>

<nav style="background-color: rgba(0,0,0,0.7); padding-left: 100px" class="navbar navbarfont navbar-expand-lg navbar-inverse navbar-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img style="height: 60px" src="{{ asset('/assets/gambar/logo2.png') }} "
             alt="logo"/>
    </a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul style="padding-right: 100px" class="navbar-nav ml-auto mt-2 mt-lg-0  ">
            <li class="nav-item active navbartataletak itemhover">
                <a class="nav-link " href="/">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active navbartataletak itemhover">
                <a class="nav-link" href="/admin">Product<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active navbartataletak itemhover">
                <a class="nav-link" href="/login">Login <span class="sr-only">(current)</span></a>
            </li>

        </ul>
    </div>
</nav>

<div class="content">
    @yield('content')
</div>

<footer style="padding-top: 40px" class="footer mt-auto">
    <div class="copyright bg-white">
        <p>
            &copy; <span id="copy-year">2019</span> Copyright Pipin
        </p>
    </div>
    <script>
        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
    </script>
</footer>

</body>
</html>
