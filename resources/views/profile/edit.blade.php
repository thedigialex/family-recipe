<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </x-container>

    <x-container>
        <div class="max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
    </x-container>

    <x-container>
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </x-container>
</x-app-layout>