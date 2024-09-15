<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <x-fonts.sub-header>
                {{ __('Profile') }}
            </x-fonts.sub-header>
        </div>
    </x-slot>

    <x-container>
        @include('profile.partials.update-profile-information-form')
    </x-container>

    <x-container>
        @include('profile.partials.update-password-form')
    </x-container>

    <x-container>
        @include('profile.partials.delete-user-form')
    </x-container>
</x-app-layout>