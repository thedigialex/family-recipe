<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <x-fonts.sub-header>
                {{ __('Family Recipe Book Information') }}
            </x-fonts.sub-header>
        </div>
    </x-slot>

    <!-- Section to explain family creation and joining -->
    <x-container>
        <x-fonts.sub-header>About Family Recipe Book</x-fonts.sub-header>
        <x-fonts.paragraph class="mt-4">
            Welcome to the Family Recipe Book website! This platform allows families to create, share, and manage their favorite recipes. Users can either create a new family or request to join an existing family.
        </x-fonts.paragraph>
        <x-fonts.paragraph class="mt-4">
            Upon creating a family, the user becomes the head of the family, gaining full control over family settings, including approving, editing, and removing family members. Being part of a family grants access to all the recipes that have been shared with the family.
        </x-fonts.paragraph>
        <x-fonts.paragraph class="mt-4">
            Recipes can include the following details:
            <ul class="list-disc list-inside mt-2">
                <li>Title</li>
                <li>Description</li>
                <li>Cook Time</li>
                <li>Serving Size</li>
                <li>Directions</li>
                <li>Ingredients</li>
            </ul>
        </x-fonts.paragraph>
        <x-fonts.paragraph class="mt-4">
            Recipes can only be edited by the user who created them or the head of the family, ensuring that only trusted members can make changes. As a family member, you can view all recipes and enjoy easy access to your family's treasured meals.
        </x-fonts.paragraph>
        <x-fonts.paragraph class="mt-4">
            You can also request to join an existing family. The head of the family will approve or deny your request. Once approved, you'll have access to all the shared recipes and can contribute your own culinary creations.
        </x-fonts.paragraph>
    </x-container>

    <!-- Section to explain recipe editing permissions -->
    <x-container>
        <x-fonts.sub-header>Recipe Editing Permissions</x-fonts.sub-header>
        <x-fonts.paragraph class="mt-4">
            Only the creator of a recipe or the family head can edit a recipe. This permission ensures that recipes are well-managed and prevents unauthorized changes to family favorites.
        </x-fonts.paragraph>
        <x-fonts.paragraph class="mt-4">
            Family members can view all recipes but can only edit their own creations unless granted permission by the head of the family.
        </x-fonts.paragraph>
    </x-container>

    <!-- Section to highlight recipe creation process -->
    <x-container>
        <x-fonts.sub-header>How to Add a Recipe</x-fonts.sub-header>
        <x-fonts.paragraph class="mt-4">
            Adding a recipe is simple:
            <ol class="list-decimal list-inside mt-2">
                <li>Create or join a family.</li>
                <li>Navigate to the "Add Recipe" section.</li>
                <li>Fill in the required fields: title, description, cook time, serving size, directions, and ingredients.</li>
                <li>Submit the recipe and share it with your family!</li>
            </ol>
        </x-fonts.paragraph>
        <x-fonts.paragraph class="mt-4">
            Once a recipe is added, it will be available for all family members to view. Only the family head or the recipe creator can edit the recipe.
        </x-fonts.paragraph>
    </x-container>

</x-app-layout>