<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-800">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md">
            <h1 class="text-2xl font-bold mb-4">Liste des Utilisateurs</h1>
            <ul>
                @foreach ($users as $user)
                    <li>
                        {{ $user->name }}
                        @if($user->statut == 1)
                            (Coach)
                        @elseif($user->statut == 2)
                            (Rameur)
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
