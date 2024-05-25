<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Family;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $families = $user->families()->wherePivot('approved', true)->get();
        $recipes = Recipe::whereIn('family_id', $families->pluck('id'))->get();

        return view('recipes.index', compact('recipes'));
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function create()
    {
        $user = Auth::user();
        $families = $user->families()->wherePivot('approved', true)->get();

        if ($families->isEmpty()) {
            return redirect()->route('families.create')->with('error', 'You must join or create a family before creating a recipe.');
        }

        $recipe = new Recipe();

        return view('recipes.form', compact('families', 'recipe'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'serving_size' => 'required',
            'cook_time' => 'required',
            'description' => 'required',
            'instructions' => 'required',
            'family_id' => 'required|exists:families,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
        }

        Recipe::create([
            'title' => $request->title,
            'serving_size' => $request->serving_size,
            'cook_time' => $request->cook_time,
            'description' => $request->description,
            'instructions' => $request->instructions,
            'image_path' => $imagePath,
            'user_id' => Auth::id(),
            'family_id' => $request->family_id,
        ]);

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
    }

    public function edit(Recipe $recipe)
    {
        $user = Auth::user();
        $families = $user->families()->wherePivot('approved', true)->get();

        return view('recipes.form', compact('recipe', 'families'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'title' => 'required',
            'serving_size' => 'required',
            'cook_time' => 'required',
            'description' => 'required',
            'instructions' => 'required',
            'family_id' => 'required|exists:families,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $recipe->image_path;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
        }

        $recipe->update([
            'title' => $request->title,
            'serving_size' => $request->serving_size,
            'cook_time' => $request->cook_time,
            'description' => $request->description,
            'instructions' => $request->instructions,
            'image_path' => $imagePath,
            'family_id' => $request->family_id,
        ]);

        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully.');
    }
}
