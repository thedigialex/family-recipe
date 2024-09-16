<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        return view('recipes.index', ['familiesWithRecipes' => $this->getFamiliesWithRecipes()]);
    }

    public function show(Request $request)
    {
        $recipe = Recipe::findOrFail($request->input('id'));
        $showEditButton = $this->canEditRecipe($recipe);

        if (!$this->userBelongsToFamily($recipe->family_id)) {
            return redirect()->route('recipes.index');
        }

        return view('recipes.show', compact('recipe', 'showEditButton'));
    }

    public function create()
    {
        $families = $this->getApprovedFamilies();
        return view('recipes.form', ['families' => $families, 'recipe' => new Recipe()]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $this->validateRecipe($request);
        $imagePath = $this->storeImage($request);

        Recipe::create(array_merge($validatedData, [
            'image_path' => $imagePath,
            'user_id' => Auth::id(),
        ]));

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
    }

    public function edit(Request $request)
    {
        $recipe = Recipe::findOrFail($request->input('id'));

        if (!$this->canEditRecipe($recipe)) {
            return redirect()->route('recipes.index')->with('error', 'You are not authorized to edit this recipe.');
        }

        return view('recipes.form', ['recipe' => $recipe, 'families' => $this->getApprovedFamilies()]);
    }

    public function update(Request $request)
    {
        $validatedData = $this->validateRecipe($request);
        $recipe = Recipe::findOrFail($request->id);
        $imagePath = $this->storeImage($request, $recipe->image_path);

        $recipe->update(array_merge($validatedData, ['image_path' => $imagePath]));

        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully.');
    }

    public function destroy(Recipe $recipe)
    {
        if (!$this->canEditRecipe($recipe)) {
            return redirect()->route('recipes.index')->with('error', 'You are not authorized to delete this recipe.');
        }
        $this->deleteImage($recipe->image_path);
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully.');
    }

    private function validateRecipe(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'serving_size' => 'required',
            'cook_time' => 'required',
            'ingredients' => 'required',
            'description' => 'required',
            'instructions' => 'required',
            'family_id' => 'required|exists:families,id',
            'image' => 'nullable|image|max:2048',
        ]);
    }

    private function storeImage(Request $request, $existingImagePath = null)
    {
        if ($request->hasFile('image')) {
            if ($existingImagePath) {
                \Storage::disk('public')->delete($existingImagePath);
            }
            return $request->file('image')->store('recipe_images', 'public');
        }

        return $existingImagePath;
    }

    private function deleteImage($imagePath)
    {
        if ($imagePath) {
            \Storage::disk('public')->delete($imagePath);
        }
    }

    private function getApprovedFamilies()
    {
        return Auth::user()->getFamilies()->wherePivot('approved', true)->get();
    }

    private function getFamiliesWithRecipes()
    {
        return $this->getApprovedFamilies()->map(function ($family) {
            $family->recipes = $family->recipes()->get();
            return $family;
        });
    }

    private function canEditRecipe(Recipe $recipe)
    {
        $user = Auth::user();
        return $recipe->user_id == $user->id || $recipe->family->head_id == $user->id;
    }

    private function userBelongsToFamily($familyId)
    {
        return $this->getApprovedFamilies()->contains('id', $familyId);
    }
}
