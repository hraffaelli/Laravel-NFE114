<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>App VA'A</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>

        .image {
            background: url('/public/images/pirogue.png') no-repeat center center fixed;
            background-size: cover;
            font-family: 'figtree', sans-serif;
        }
    </style>

</head>

<body class="antialiased">
<div class="flex flex-col items-center justify-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div class="text-center">
        <br><br><br>
        <h1 class="text-4xl font-bold mb-8 text-gray-800 dark:text-white">Bienvenue sur VA'A app</h1>
        <br><br><br>

        <div class="flex flex-col items-center space-y-4 p-4 bg-gray-800 rounded-md shadow-md max-w-md mx-auto">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/seances') }}" class="font-semibold text-gray-600 hover:text-green-600 dark:text-gray-400 dark:hover:text-green-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-xl font-semibold text-gray-600 hover:text-green-600 dark:text-gray-400 dark:hover:text-green-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-xl font-semibold text-gray-600 hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <!-- Pied de page -->
    <footer class="mt-auto text-center text-gray-500 dark:text-gray-400 py-4">
        <p>&copy; {{ date('Y') }} VA'A app. Tous droits réservés.</p>
        <p>By Heremoana, Hiomai, Richard & Tevahinemoeatere</p>
    </footer>
</div>
</body>

</html>
