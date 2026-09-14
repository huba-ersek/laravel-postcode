<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posta</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul class="navbar">
                <li><a href="{{ route('index') }}">Főoldal</a></li>
                <li><a href="{{ route('counties.index') }}">Megyék</a></li>
                <li><a href="{{ route('cities.index') }}">Városok</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <hr>
    <footer>
        © 2026 Érsek Huba
    </footer>
</body>
</html>