<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Utilisateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($is_Coach)
                    <div class="col ">
                        <a class="btn btn-sm btn-success" href={{ route('profile.create') }}>
                            <x-primary-button class="mb-4">{{ __('Créer une Utilisateur') }}</x-primary-button>
                        </a>
                    </div>
                    @endif
                    <div class="min-w-full align-middle">
                        <table class="min-w-full border divide-y divide-gray-200 w-full rounded-lg">
                            <thead>
                                <tr>
                                    <th class=" px-6 py-3 text-center">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Nom</span>
                                    </th>
                                    <th class=" px-6 py-3 text-center">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">mail</span>
                                    </th>
                                    <th class=" px-6 py-3 text-center">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Statut</span>
                                    </th>
                                    <th class="w-56  px-6 py-3 text-center">
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-gray divide-y divide-gray-200 divide-solid">
                                @foreach($profiles as $profile)
                                <tr class="bg-gray">
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        {{ $profile->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        {{ $profile->email }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        {{ $profile->libelle }}
                                    </td>
                                    @if($is_Coach)
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="{{ route('profile.edit-multi', $profile->id) }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                                Modifier
                                            </a>
                                            <form action="{{ route('profile.delete', $profile->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>
                                                    Supprimer
                                                </x-danger-button>
                                            </form>
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>