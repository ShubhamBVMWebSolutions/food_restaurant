<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodCategory;
use App\Models\ingredient;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $ingredient = ingredient::get();
        return response()->json($ingredient);
    }

    public function store(Request $request)
    {
        $ingredient= $request->tag;
        $existingIngredient = ingredient::where('ingredient',$ingredient)->first();
        if ($existingIngredient) {
            return response()->json(['error' => 'Ingredient with this name already exists'], 422);
        }
        ingredient::create(['ingredient'=>$ingredient]);
        return response()->json(['success' => 'Category saved successfully']);
    }
}
