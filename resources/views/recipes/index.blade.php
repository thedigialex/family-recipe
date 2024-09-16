<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <x-fonts.sub-header>
                {{ __('Recipes') }}
            </x-fonts.sub-header>

            <a href="{{ route('recipes.create') }}">
                <x-primary-button> Create Recipe</x-primary-button>
            </a>
        </div>
    </x-slot>
    @if (!$familiesWithRecipes->isEmpty())
    <x-container>
        <div>
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

            @foreach ($familiesWithRecipes as $family)
                <x-fonts.sub-header>{{ $family->name }}'s Recipes</x-fonts.sub-header>

                @if ($family->recipes->isEmpty())
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Notice:</strong>
                    <span class="block sm:inline">There are no recipes for {{ $family->name }}. Please add a new recipe.</span>
                </div>
                @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @foreach($family->recipes as $recipe)
                        <x-recipe-card :recipe="$recipe" />
                    @endforeach
                </div>
                @endif
            @endforeach

        </div>
    </x-container>
@endif

</x-app-layout>