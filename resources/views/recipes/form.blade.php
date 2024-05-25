<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $recipe->exists ? __('Edit Recipe') : __('Create Recipe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                            <input type="text" name="title" id="title" value="{{ old('title', $recipe->title) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('description', $recipe->description) }}</textarea>
                        </div>

                        <div class="mb-4 flex space-x-4">
                            <div class="flex-1">
                                <label for="family_id" class="block text-gray-700 text-sm font-bold mb-2">Family:</label>
                                <select name="family_id" id="family_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    @foreach($families as $family)
                                    <option value="{{ $family->id }}" {{ $recipe->family_id == $family->id ? 'selected' : '' }}>{{ $family->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex-1">
                                <label for="cook_time" class="block text-gray-700 text-sm font-bold mb-2">Cook Time:</label>
                                <input type="text" name="cook_time" id="cook_time" value="{{ old('cook_time', $recipe->cook_time) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div class="flex-1">
                                <label for="serving_size" class="block text-gray-700 text-sm font-bold mb-2">Serving Size:</label>
                                <input type="text" name="serving_size" id="serving_size" value="{{ old('serving_size', $recipe->serving_size) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="instructions" class="block text-gray-700 text-sm font-bold mb-2">Instructions:</label>
                            <textarea name="instructions" id="instructions" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('instructions', $recipe->instructions) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="ingredients" class="block text-gray-700 text-sm font-bold mb-2">Ingredients:</label>
                            <textarea name="ingredients" id="ingredients" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Recipe Image:</label>
                            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @if($recipe->image_path)
                            <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="mt-2 w-48 h-48">
                            @endif
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ $recipe->exists ? 'Update Recipe' : 'Create Recipe' }}
                        </button>
                    </form>

                    @if($recipe->exists)
                    <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Delete Recipe
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>