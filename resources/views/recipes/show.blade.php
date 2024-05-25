<!-- resources/views/recipes/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $recipe->title }}
        </h2>
    </x-slot>

    <div class="py-12 bg-green-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center mb-6">
                        @if($recipe->image_path)
                            <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="w-1/3 h-64 object-cover rounded-lg mr-4">
                        @endif
                        <h1 class="text-3xl font-semibold text-green-600 flex-1">{{ $recipe->title }}</h1>
                    </div>

                    <div class="bg-gray-100 p-4 rounded-lg mb-6 flex justify-between">
                        <div class="text-lg"><strong>Serving Size:</strong> {{ $recipe->serving_size }}</div>
                        <div class="text-lg"><strong>Cook Time:</strong> {{ $recipe->cook_time }} minutes</div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-green-600 mb-4">Ingredients</h2>
                            <ul class="list-disc pl-5 space-y-2">
                                @foreach(explode("\n", $recipe->ingredients) as $ingredient)
                                    <li>{{ $ingredient }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-green-600 mb-4">Steps</h2>
                            <ol class="list-decimal pl-5 space-y-2">
                                @foreach(explode("\n", $recipe->instructions) as $step)
                                    <li>{{ $step }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>

                    @if($recipe->description)
                        <div class="mt-6">
                            <h2 class="text-2xl font-bold text-green-600 mb-4">Description</h2>
                            <p class="text-lg">{{ $recipe->description }}</p>
                        </div>
                    @endif

                    <div class="mt-6">
                        <a href="{{ route('recipes.edit', $recipe) }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit Recipe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>