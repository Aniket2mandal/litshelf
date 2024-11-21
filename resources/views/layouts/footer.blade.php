<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<link rel="stylesheet" href="css/about.css">
<body>
    <div class="footer">

        <main class="py-4">
            @yield('footer')
        </main>
    </div>
</body>
</html>
