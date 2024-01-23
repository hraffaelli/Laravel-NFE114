<x-auth-session-status class="mb-4" :status="session('status')"/>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Créer un Utilisateur - {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200">
                    <div class="min-h-screen flex items-center justify-center">
                        <div class="w-full bg-gray-600 p-8 rounded shadow-md">
                            <h1 class="text-2xl font-bold mb-4 text-center dark:text-white">Créer un Utilisateur</h1>

                            <form action="{{ route('users.store') }}" method="post" class="space-y-4">
                                @csrf

                                <div class="bg-gray-500 rounded-md p-2">
                                    <label for="name" class="block text-white">Nom :</label>
                                    <input type="text" name="name" id="name" required
                                           class="w-full px-4 py-2 border rounded-md bg-gray-200 text-gray-800">
                                </div>

                                <div class="bg-gray-500 rounded-md p-2">
                                    <label for="email" class="block text-white">Email :</label>
                                    <input type="email" name="email" id="email" required
                                           class="w-full px-4 py-2 border rounded-md bg-gray-200 text-gray-800">
                                </div>

                                <div class="bg-gray-500 rounded-md p-2">
                                    <label for="password" class="block text-white">Mot de passe :</label>
                                    <input type="password" name="password" id="password"
                                           required
                                           class="w-full px-4 py-2 border rounded-md bg-gray-200 text-gray-800">
                                </div>

                                <div class="bg-gray-500 rounded-md p-2">
                                    <label for="statut" class="block text-white">Statut :</label>
                                    <input type="number" name="statut" id="statut" required
                                           class="w-full px-4 py-2 border rounded-md bg-gray-200 text-gray-800">
                                </div>

                                <button type="submit"
                                        class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                                    Créer un utilisateur
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

