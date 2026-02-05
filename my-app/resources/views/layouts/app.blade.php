<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <header style="background-color: #1b72c9">
    <h1>イノセントSNSアプリ</h1>

    </header>
    <div class='content'>
        @yield('content')
    </div>
    <footer style="background-color: #1b72c9">
        <p>@ 2026 イノセントSNSアプリ</p>
    </footer>  
</body>

</html>
