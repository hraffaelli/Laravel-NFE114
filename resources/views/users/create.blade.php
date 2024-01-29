<x-auth-session-status :status="session('status')"/>
<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Créer un Utilisateur - {{ __('Dashboard') }}
    </h2>
</x-slot>

    <div class="container">
        <h2>Nouvel Utilisateur</h2>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="statut" class="form-label">Choisir le Statut : </label>
                <select id="statut" name="statut">
                    <option value="1">Coach</option>
                    <option value="2">Rammeur</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</x-app-layout>
