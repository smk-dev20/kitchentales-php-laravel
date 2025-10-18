<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of recipes belonging to the logged-in user.
     */
    public function index()
    {
        $recipes = Recipe::where('user_id', auth()->id())->latest()->get();
        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new recipe.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created recipe in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('recipes', 'public');
        }

        $validated['user_id'] = auth()->id();

        Recipe::create($validated);

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
    }

    /**
     * Show the form for editing the specified recipe.
     */
    public function edit(Recipe $recipe)
    {
        $this->authorizeOwner($recipe);

        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified recipe in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        $this->authorizeOwner($recipe);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('recipes', 'public');
        }

        $recipe->update($validated);

        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully.');
    }

    /**
     * Remove the specified recipe from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $this->authorizeOwner($recipe);

        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully.');
    }

    /**
     * Show a single recipe (optional).
     */
    public function show(Recipe $recipe)
    {
        $this->authorizeOwner($recipe);

        return view('recipes.show', compact('recipe'));
    }

    /**
     * Private helper to ensure the logged-in user owns the recipe.
     */
    private function authorizeOwner(Recipe $recipe)
    {
        if ($recipe->user_id !== auth()->id()) {
            abort(403); // Forbidden if the current user does not own this recipe
        }
    }
}
