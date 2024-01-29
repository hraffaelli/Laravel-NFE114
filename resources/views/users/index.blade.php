<x-auth-session-status :status="session('status')"/>
<div class="container">
    <h2>Liste des Utilisateurs</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Nouvel Utilisateur</a>

    <table class="table">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $usersStatuts[$user->statut] ?? 'Statut inconnu' }}</td>
                <td>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
