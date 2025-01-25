<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coalition V2 Dev Test</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav>

</nav>

<main>
    @yield('content')
</main>

<footer>

</footer>

@stack('ajax-script')
</body>
</html>
