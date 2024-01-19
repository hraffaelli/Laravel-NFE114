<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Utilisateur</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4">Créer un Utilisateur</h1>

        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>

            <label for="statut">Email :</label>
            <input type="number" name="statut" id="statut" required>

            <button type="submit">Créer</button>
        </form>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

