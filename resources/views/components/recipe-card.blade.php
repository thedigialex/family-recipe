@props(['recipe'])

<style>
    .flip-card {
        perspective: 1000px;
    }

    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        transition: transform 0.6s;
        transform-style: preserve-3d;
    }

    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 0.75rem;
    }

    .flip-card-back {
        transform: rotateY(180deg);
    }
</style>

<div class="flip-card w-full h-80 rounded-lg overflow-hidden duration-300">
    <div class="flip-card-inner">
        <div class="flip-card-front bg-backgroundLightAccent">
            @if($recipe->image_path)
            <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="w-full h-full object-cover rounded-lg">
            @endif
            <div class="absolute bottom-0 left-0 w-full bg-backgroundLightAccent bg-opacity-75 p-4 rounded-b-lg">
                <h3 class="font-semibold">{{ $recipe->title }}</h3>
            </div>
        </div>
        <div class="flip-card-back p-4 flex flex-col justify-between bg-backgroundLightAccent">
            <div>
                <h3 class="font-semibold ">{{ $recipe->title }}</h3>
                <p class=" mt-2">{{ $recipe->description }}</p>
            </div>
            <x-secondary-button onclick="window.location='{{ route('recipes.show', $recipe) }}'">
                View Recipe
            </x-secondary-button>
        </div>
    </div>
</div>