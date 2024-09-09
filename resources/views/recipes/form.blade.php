<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ $recipe->exists ? __('Edit Recipe') : __('Create Recipe') }}
        </h2>
    </x-slot>

    <x-container>
        <div>
            @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ $recipe->exists ? route('recipes.update', $recipe) : route('recipes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($recipe->exists)
                @method('PUT')
                @endif

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <x-inputs.text-input type="text" name="title" id="title" value="{{ old('title', $recipe->title) }}" required></x-inputs.text-input>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <x-text-area name="description" id="description" value="{{ old('description', $recipe->description) }}" required></x-text-area>
                </div>

                <div class="mb-4 flex space-x-4">
                    <div class="flex-1">
                        <label for="family_id" class="block text-gray-700 text-sm font-bold mb-2">Family:</label>
                        <x-select name="family_id" id="family_id" :options="$families->map(fn($family) => ['value' => $family->id, 'text' => $family->name])->toArray()" :selected="old('family_id', $recipe->family_id)" required />
                    </div>

                    <div class="flex-1">
                        <label for="cook_time" class="block text-gray-700 text-sm font-bold mb-2">Cook Time:</label>
                        <x-inputs.text-input type="text" name="cook_time" id="cook_time" value="{{ old('cook_time', $recipe->cook_time) }}" required></x-inputs.text-input>
                    </div>

                    <div class="flex-1">
                        <label for="serving_size" class="block text-gray-700 text-sm font-bold mb-2">Serving Size:</label>
                        <x-inputs.text-input type="text" name="serving_size" id="serving_size" value="{{ old('serving_size', $recipe->serving_size) }}" required></x-inputs.text-input>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="instructions" class="block text-gray-700 text-sm font-bold mb-2">Instructions:</label>
                    <x-text-area name="instructions" id="instructions" value="{{ old('instructions', $recipe->instructions) }}" required></x-text-area>
                </div>

                <div class="mb-4">
                    <label for="ingredients" class="block text-gray-700 text-sm font-bold mb-2">Ingredients:</label>
                    <x-text-area name="ingredients" id="ingredients" value="{{ old('ingredients', $recipe->ingredients) }}" required></x-text-area>
                </div>

                <div class="mb-4">
                    @if($recipe->image_path)
                    <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="mt-2 w-48 h-48">
                    @endif
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Recipe Image:</label>
                    <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="flex items-center space-x-4">
                    <x-secondary-button type="submit">
                        {{ $recipe->exists ? 'Update Recipe' : 'Create Recipe' }}
                    </x-secondary-button>
                </div>
            </form>

            @if($recipe->exists)
            <div class="flex items-center space-x-4 mt-4">
                <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Delete Recipe
                    </button>
                </form>
            </div>
            @endif
        </div>
    </x-container>
</x-app-layout>