<x-container>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-fonts.input-label  for="login_email" :value="__('Email')" />
            <x-inputs.text-input id="login_email" type="email" name="login_email" :value="old('login_email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('login_email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-fonts.input-label  for="login_password" :value="__('Password')" />
            <x-inputs.text-input id="login_password" type="password" name="login_password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('login_password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-secondary-button class="ms-3">
                {{ __('Log in') }}
            </x-secondary-button>
        </div>
    </form>
</x-container>