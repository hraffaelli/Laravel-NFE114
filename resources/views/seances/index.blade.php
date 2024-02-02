<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Séance') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($is_Coach)
                    <div class="col ">
                        <a class="btn btn-sm btn-success" href={{ route('seances.create') }}>
                            <x-primary-button class="mb-4">{{ __('Créer une séance') }}</x-primary-button>
                        </a>
                    </div>
                    @endif

                    <div class="min-w-full align-middle">
                        <table class="min-w-full border divide-y divide-gray-200 w-full rounded-lg">
                            <thead>
                                <tr>
                                    <th class="bg-gray-50 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Date</span>
                                    </th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Lieu</span>
                                    </th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Horaire</span>
                                    </th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Max personne</span>
                                    </th>
                                    <th class="w-56 bg-gray-50 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Poste</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-gray divide-y divide-gray-200 divide-solid">
                                @foreach($seances as $seance)
                                <tr class="bg-gray">
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        {{ $seance->date }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        {{ $seance->lieu }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        {{ $seance->horaire }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        {{ $is_Max_User[$seance->id] }}/{{ $seance->max_users }}
                                    </td>

                                    @if ($is_Max_User[$seance->id] != $seance->max_users)

                                    @if($participantStatus[$seance->id] == 0)

                                    <!-- Poste rameur -->
                                    <form action="{{ route('seances.addParticipant', $seance->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        <td class=" px-6 py-4 text-sm leading-5 text-white-100 whitespace-no-wrap text-center">
                                            <select id="poste" name="poste" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25" required>
                                                @foreach($postes as $poste)
                                                <option class="text-black-100" value="{{ $poste->id }}">{{ $poste->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                            <x-primary-button class="ms-3">
                                                {{ __('Participer') }}
                                            </x-primary-button>
                                        </td>
                                    </form>
                                    @else
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        <a class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                            {{ $is_Poste_Rameur[$seance->id] }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        <a href="{{ route('seances.deleteParticipant', $seance->id) }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                            Annuler
                                        </a>
                                    </td>
                                    @endif

                                    @elseif ($is_Max_User[$seance->id] == $seance->max_users && $participantStatus[$seance->id] != 0)
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        <a class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                            {{ $is_Poste_Rameur[$seance->id] }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        <a href="{{ route('seances.deleteParticipant', $seance->id) }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                            Annuler
                                        </a>
                                    </td>
                                    @else
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        <a class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                            {{ $is_Poste_Rameur[$seance->id] }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        <a class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                            Complet
                                        </a>
                                    </td>
                                    @endif

                                    @if($is_Coach)
                                    <td class="px-6 py-4 text-sm leading-5 text-white-900 whitespace-no-wrap text-center">
                                        <a href="{{ route('seances.edit', $seance->id) }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                            Modifier
                                        </a>
                                        <form action="{{ route('seances.destroy', $seance->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>
                                                Supprimer
                                            </x-danger-button>
                                        </form>
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