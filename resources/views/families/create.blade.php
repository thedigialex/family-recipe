<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Create a New Family') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="text-gray-900">
            @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
            @endif

            <form action="{{ route('families.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Family Name:</label>
                    <x-inputs.text-input type="text" name="name" id="name" required></x-inputs.text-input>
                </div>

                <x-secondary-button type="submit">Create Family</x-secondary-button>
            </form>
        </div>
    </x-container>
</x-app-layout>