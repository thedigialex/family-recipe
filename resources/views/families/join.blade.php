<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Join an Existing Family') }}
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

            @if ($families->isEmpty())
            <p>No families available to join at this time.</p>
            @else
            <form action="{{ route('families.join') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="family_id" class="block text-gray-700 text-sm font-bold mb-2">Select Family:</label>
                    <select name="family_id" id="family_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        @foreach($families as $family)
                        <option value="{{ $family->id }}">{{ $family->name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-primary-button type="submit">Request to Family</x-primary-button>
            </form>
            @endif
        </div>
    </x-container>
</x-app-layout>