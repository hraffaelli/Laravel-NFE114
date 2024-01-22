<x-auth-session-status class="mb-4" :status="session('status')"/>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier un Utilisateur - {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="min-h-screen flex items-center justify-center">
                        <div class="bg-gray-600 p-8 rounded shadow-md">
                            <div class="mt-1 mb-2">
                                <a href="{{ route('users.index') }}" class="text-blue-500 flex items-center">
                                    <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>
                                    </svg>
                                    Retour à l'index
                                </a>
                            </div>
                            <h1 class="text-2xl font-bold mb-4">Détails de l'Utilisateur</h1>
                            <div>
                                <p><strong>Nom :</strong> {{ $user->name }}</p>
                                <p><strong>Email :</strong> {{ $user->email }}</p>
                                <p><strong>Statut :</strong>
                                    @if($user->statut == 1)
                                        Coach
                                    @elseif($user->statut == 2)
                                        Rameur
                                    @endif
                                </p>
                            </div>

                            <div class="mt-1">
                                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500">Modifier</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mt-1 text-red-500">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
