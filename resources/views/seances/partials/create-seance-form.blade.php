<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Créer une Séance') }}
        </h2>
    </header>

    <form method="post" action="{{ route('seances.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Date')" />
            <x-text-input id="date" name="date" type="date" class="mt-1 block w-full" required autofocus autocomplete="date" />
            <x-input-error class="mt-2" :messages="$errors->get('date')" />
        </div>

        <div>
            <x-input-label for="lieu" :value="__('Lieu')" />
            <x-text-input id="lieu" name="lieu" type="text" class="mt-1 block w-full" required autofocus autocomplete="lieu" />
            <x-input-error class="mt-2" :messages="$errors->get('lieu')" />
        </div>

        <div>
            <x-input-label for="horaire" :value="__('Horaire')" />
            <x-text-input id="horaire" name="horaire" type="time" class="mt-1 block w-full" required autofocus autocomplete="horaire" />
            <x-input-error class="mt-2" :messages="$errors->get('horaire')" />
        </div>

        <div>
            <x-input-label for="max_users" :value="__('Max personnes')" />
            <x-text-input id="max_users" name="max_users" type="text" class="mt-1 block w-full" required autofocus autocomplete="max_users" />
            <x-input-error class="mt-2" :messages="$errors->get('max_users')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>