<x-auth-session-status class="mb-4" :status="session('status')" />

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Liste des Utilisateurs - {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="min-h-screen flex items-center justify-center">
                        <div class="bg-gray-600 p-8 rounded shadow-md">
                            <h1 class="text-3xl font-bold mb-4 text-center">Liste des Utilisateurs</h1>
                            <table class="min-w-full">
                                <!-- Table Header -->
                                <thead>
                                <tr>
                                    <th class="border px-4 py-2">Nom</th>
                                    <th class="border px-4 py-2">Statut</th>
                                    @if(auth()->user()->statut == 1)
                                    <th class="border px-4 py-2">Actions</th>
                                    @endif
                                </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $user->name }}</td>
                                        <td class="border px-4 py-2">
                                            @if($user->statut == 1)
                                                Coach
                                            @elseif($user->statut == 2)
                                                Rameur
                                            @endif
                                        </td>
                                        @if(auth()->user()->statut == 1)
                                        <td class="border px-4 py-2 text-center">
                                            <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 hover:underline">Voir</a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <!-- Bouton de création d'utilisateur -->
                            @if(auth()->user()->statut == 1)
                                <div class="mt-5">
                                    <a href="{{ route('users.create') }}" class="text-blue-500 flex items-center">
                                        Créer un utilisateur
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
