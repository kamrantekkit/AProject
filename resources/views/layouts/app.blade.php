<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title")</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss','resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="main-background">
            @yield("content")
    </main>

    <footer>
        <div class="p-3 text-center text-white bg-dark">
            © 2023 Copyright: Kamran
        </div>
    </footer>
</body>
</html>
