@props(['recipe'])

<div class="flip-card w-full h-80 rounded-lg overflow-hidden duration-300">
    <div class="flip-card-inner">
        <div class="flip-card-front bg-backgroundAccent">
            @if($recipe->image_path)
            <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="w-full h-full object-cover rounded-lg">
            @endif
            <div class="absolute bottom-0 left-0 w-full bg-backgroundAccent bg-opacity-75 p-4 rounded-b-lg">
                <x-fonts.accent-header class="font-semibold">{{ $recipe->title }}</x-fonts.accent-header>
            </div>
        </div>
        <div class="flip-card-back p-4 flex flex-col justify-between bg-backgroundAccent">
            <div>
                <x-fonts.accent-header>{{ $recipe->title }}</x-fonts.accent-header>
                <x-fonts.paragraph class=" mt-2">{{ $recipe->description }}</x-fonts.paragraph>
            </div>
            <form action="{{ route('recipes.show') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $recipe->id }}">
                <x-secondary-button type="submit" class="w-full">View Recipe</x-secondary-button>
            </form>
        </div>
    </div>
</div>