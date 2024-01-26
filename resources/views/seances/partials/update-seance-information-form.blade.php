<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Modifier la Séance') }}
        </h2>

        <!-- <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p> -->
    </header>

    <form method="post" action="{{ route('seances.update', $seance->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <x-input-label for="name" :value="__('Date')" />
            <x-text-input id="date" name="date" type="date" class="mt-1 block w-full" :value="old('date', $seance->date)" required autofocus autocomplete="date" />
            <x-input-error class="mt-2" :messages="$errors->get('date')" />
        </div>

        <div>
            <x-input-label for="lieu" :value="__('Lieu')" />
            <x-text-input id="lieu" name="lieu" type="text" class="mt-1 block w-full" :value="old('lieu', $seance->lieu)" required autofocus autocomplete="lieu" />
            <x-input-error class="mt-2" :messages="$errors->get('lieu')" />
        </div>

        <div>
            <x-input-label for="horaire" :value="__('Horaire')" />
            <x-text-input id="horaire" name="horaire" type="time" class="mt-1 block w-full" :value="old('horaire', $seance->horaire)" required autofocus autocomplete="horaire" />
            <x-input-error class="mt-2" :messages="$errors->get('horaire')" />
        </div>

        <div>
            <x-input-label for="max_users" :value="__('Max personnes')" />
            <x-text-input id="max_users" name="max_users" type="text" class="mt-1 block w-full" :value="old('max_users', $seance->max_users)" required autofocus autocomplete="max_users" />
            <x-input-error class="mt-2" :messages="$errors->get('max_users')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>