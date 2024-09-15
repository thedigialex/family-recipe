<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <x-fonts.sub-header>
                {{ $recipe->exists ? __('Edit Recipe') : __('Create Recipe') }}
            </x-fonts.sub-header>
        </div>
    </x-slot>

    <x-container>
        <div>
            @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ $recipe->exists ? route('recipes.update') : route('recipes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($recipe->exists)
                @method('PUT')
                <!-- Hidden input field to pass the recipe ID -->
                <input type="hidden" name="id" value="{{ $recipe->id }}">
                @endif

                <div class="flex items-start mb-6">
                    @if($recipe->image_path)
                    <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="w-1/3 h-64 object-cover rounded-lg mr-6">
                    @endif

                    <div class="flex flex-col flex-1 space-y-4">
                        <div class="flex-1">
                            <x-fonts.input-label for="title">Title:</x-fonts.input-label>
                            <x-inputs.text-input type="text" name="title" id="title" value="{{ old('title', $recipe->title) }}" required></x-inputs.text-input>
                        </div>
                        <x-fonts.input-label for="image">Recipe Image:</x-fonts.input-label>
                        <input type="file" name="image" id="image">
                        <div class="mb-4 flex space-x-4">
                            <div class="flex-1">
                                <x-fonts.input-label for="family_id">Family:</x-fonts.input-label>
                                <x-inputs.select name="family_id" id="family_id" :options="$families->map(fn($family) => ['value' => $family->id, 'text' => $family->name])->toArray()" :selected="old('family_id', $recipe->family_id)" required />
                            </div>

                            <div class="flex-1">
                                <x-fonts.input-label for="cook_time">Cook Time:</x-fonts.input-label>
                                <x-inputs.text-input type="text" name="cook_time" id="cook_time" value="{{ old('cook_time', $recipe->cook_time) }}" required></x-inputs.text-input>
                            </div>

                            <div class="flex-1">
                                <x-fonts.input-label for="serving_size">Serving Size:</x-fonts.input-label>
                                <x-inputs.text-input type="text" name="serving_size" id="serving_size" value="{{ old('serving_size', $recipe->serving_size) }}" required></x-inputs.text-input>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <x-fonts.input-label for="description">Description:</x-fonts.input-label>
                    <x-inputs.text-area name="description" id="description" value="{{ old('description', $recipe->description) }}" required></x-inputs.text-area>
                </div>

                <div class="mb-4 flex space-x-4">
                    <div class="flex-1">
                        <x-fonts.input-label for="instructions">Directions:</x-fonts.input-label>
                        <x-inputs.text-area name="instructions" id="instructions" value="{{ old('instructions', $recipe->instructions) }}" required></x-inputs.text-area>
                    </div>

                    <div class="flex-1">
                        <x-fonts.input-label for="ingredients">Ingredients:</x-fonts.input-label>
                        <x-inputs.text-area name="ingredients" id="ingredients" value="{{ old('ingredients', $recipe->ingredients) }}" required></x-inputs.text-area>
                    </div>
                </div>

                <div class="flex justify-center items-center">
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