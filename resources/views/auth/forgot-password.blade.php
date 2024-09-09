<x-container>
    <x-fonts.paragraph>
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </x-fonts.paragraph>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-fonts.input-label  for="email" :value="__('Email')" />
            <x-inputs.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-secondary-button>
                {{ __('Email Password Reset Link') }}
            </x-secondary-button>
        </div>
    </form>
</x-container>