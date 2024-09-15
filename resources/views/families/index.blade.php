<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <x-fonts.sub-header>
                {{ __('Family') }}
            </x-fonts.sub-header>
        </div>
    </x-slot>
    <x-container>
        <x-fonts.sub-header>Approved Families</x-fonts.sub-header>
        @if ($approvedFamilies->isEmpty())
        <x-fonts.paragraph class="text-gray-600">You don't belong to any families yet.</x-fonts.paragraph>
        @else
        <div class="mt-4 grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($approvedFamilies as $family)
            <div class="p-4 flex flex-col justify-between bg-backgroundAccent rounded">
                <x-fonts.accent-header>{{ $family->name }}</x-fonts.accent-header>
                <x-fonts.paragraph class="mt-2">{{ $family->description }}</x-fonts.paragraph>
                @if (auth()->user()->id === $family->head_id)
                <div class="flex mt-4">
                    <form action="{{ route('families.edit') }}" method="POST" class="w-full">
                        @csrf
                        <input type="hidden" name="id" value="{{ $family->id }}">
                        <x-secondary-button type="submit" class="w-full">Edit Family</x-secondary-button>
                    </form>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @endif
    </x-container>

    <x-container>
        <x-fonts.sub-header>Create Family</x-fonts.sub-header>
        <form action="{{ route('families.store') }}" method="POST">
            @csrf
            <x-fonts.input-label for="name">Family Name:</x-fonts.input-label>
            <div class="mb-4 flex items-center space-x-4">
                <x-inputs.text-input type="text" name="name" id="name" required class="w-[75%]" />
                <x-secondary-button type="submit" class="w-[25%]">
                    Create
                </x-secondary-button>
            </div>
        </form>
    </x-container>

    <x-container>
        <x-fonts.sub-header>Request to Join Family</x-fonts.sub-header>
        @if ($families->isEmpty())
        <x-fonts.paragraph>No families available to join at this time.</x-fonts.paragraph>
        @else
        <form action="{{ route('families.join') }}" method="POST">
            @csrf
            <x-fonts.input-label for="family_id">Select Family:</x-fonts.input-label>
            <div class="mb-4 flex items-center space-x-4">
                <x-inputs.select name="family_id" id="family_id" :options="$families->map(fn($family) => ['value' => $family->id, 'text' => $family->name])->toArray()" required class="w-[75%]" />
                <x-secondary-button type="submit" class="w-[25%]">
                    Request
                </x-secondary-button>
            </div>
        </form>
        @endif
    </x-container>
</x-app-layout>