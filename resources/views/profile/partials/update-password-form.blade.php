<section>
    <x-fonts.sub-header>
        {{ __('Update Password') }}
    </x-fonts.sub-header>
    <x-fonts.paragraph>
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-fonts.paragraph>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-fonts.input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-inputs.text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-fonts.input-label for="update_password_password" :value="__('New Password')" />
            <x-inputs.text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-fonts.input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-inputs.text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center gap-4">
            <x-secondary-button>{{ __('Save') }}</x-secondary-button>

            @if (session('status') === 'password-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>