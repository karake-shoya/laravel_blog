<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Site Info -->
    @yield('title')

    <!-- CSS -->
    @vite('resources/css/app.css')


</head>

<body class="container">
    <header id = header>

    </header>

    @yield('content')

    <footer id = "footer">

    </footer>
</body>
</html>
