<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between">
            <x-fonts.sub-header>
                {{ $recipe->title }}
            </x-fonts.sub-header>
        </div>
    </x-slot>

    <x-container>
        <div>
            <div class="flex flex-col sm:flex-row items-start mb-6">
                @if($recipe->image_path)
                <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="w-full sm:w-1/3 h-64 object-cover rounded-lg mb-4 sm:mb-0 sm:mr-6">
                @endif

                <div class="flex flex-col flex-1">
                    <x-fonts.sub-header>{{ $recipe->title }} </x-fonts.sub-header>
                    @if($recipe->description)
                    <x-fonts.accent-header>Description</x-fonts.accent-header>
                    <x-fonts.paragraph>{{ $recipe->description }}</x-fonts.paragraph>
                    @endif
                </div>
            </div>

            <div class="bg-backgroundAccent p-4 rounded-lg">
                <div class="flex flex-col sm:flex-row justify-evenly mb-4">
                    <x-fonts.paragraph ><strong>Serving Size:</strong> {{ $recipe->serving_size }}</x-fonts.paragraph>
                    <x-fonts.paragraph ><strong>Cook Time:</strong> {{ $recipe->cook_time }} minutes</x-fonts.paragraph>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 p-4 gap-4">
                    <div>
                        <x-fonts.accent-header>Ingredients</x-fonts.accent-header>
                        <div class="mx-4">
                            <ul class="list-disc pl-5 space-y-2">
                                @foreach(explode("\n", $recipe->ingredients) as $ingredient)
                                <li><x-fonts.paragraph>{{ $ingredient }}</x-fonts.paragraph></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div>
                        <x-fonts.accent-header>Directions</x-fonts.accent-header>
                        <div class="mx-4">
                            @foreach(explode("\n", $recipe->instructions) as $index => $step)
                            <x-fonts.paragraph>
                                <strong>Step {{ $index + 1 }}</strong> <br>
                                {{ $step }}
                            </x-fonts.paragraph>
                            <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            @if($showEditButton)
            <div class="flex justify-center mt-4">
                <form id="editRecipeForm" action="{{ route('recipes.edit') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="id" value="{{ $recipe->id }}">
                </form>

                <x-secondary-button onclick="document.getElementById('editRecipeForm').submit();">
                    Edit Recipe
                </x-secondary-button>
            </div>
            @endif
        </div>
    </x-container>
</x-app-layout>