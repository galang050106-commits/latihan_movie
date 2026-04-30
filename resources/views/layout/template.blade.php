<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tiMovie - @yield('title', 'Website')</title>
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('partials.navbar')

    <div class="container my-3">
        @yield('content')
    </div>

    <footer class="bg-success text-center text-white py-2">
        Copyright &copy; 2023 by Yori Adi Atma
    </footer>

    <script src="/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>