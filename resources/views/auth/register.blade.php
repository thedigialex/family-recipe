<x-container>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-fonts.input-label  for="name" :value="__('Name')" />
            <x-inputs.text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-fonts.input-label  for="email" :value="__('Email')" />
            <x-inputs.text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-fonts.input-label  for="password" :value="__('Password')" />

            <x-inputs.text-input id="password" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-fonts.input-label  for="password_confirmation" :value="__('Confirm Password')" />

            <x-inputs.text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-secondary-button class="ms-4">
                {{ __('Register') }}
            </x-secondary-button>
        </div>
    </form>
</x-container>