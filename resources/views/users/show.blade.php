<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Utilisateur</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4">Détails de l'Utilisateur</h1>

        <div>
            <p><strong>Nom :</strong> {{ $user->name }}</p>
            <p><strong>Email :</strong> {{ $user->email }}</p>
            <!-- Ajoutez d'autres détails de l'utilisateur ici -->
        </div>

        <a href="{{ route('users.edit', $user->id) }}" class="mt-4 text-blue-500">Modifier</a>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
