<x-container>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="login_email" :value="__('Email')" />
            <x-text-input id="login_email" class="block mt-1 w-full" type="email" name="login_email" :value="old('login_email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('login_email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="login_password" :value="__('Password')" />
            <x-text-input id="login_password" class="block mt-1 w-full" type="password" name="login_password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('login_password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-secondary-button class="ms-3">
                {{ __('Log in') }}
            </x-secondary-button>
        </div>
    </form>
</x-container>