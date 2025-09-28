<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    public function index()
    {
        $foods = FoodItem::all();
        return response()->json($foods);
    }

    public function show($id)
    {
        $food = FoodItem::findOrFail($id);
        return response()->json($food);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'calories' => 'required|integer',
            'protein' => 'required|numeric',
            'fat' => 'required|numeric',
            'carbs' => 'required|numeric',
            'serving_size' => 'nullable|string',
        ]);

        $food = FoodItem::create($data);
        return response()->json($food, 201);
    }

    public function update(Request $request, $id)
    {
        $food = FoodItem::findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'calories' => 'sometimes|required|integer',
            'protein' => 'sometimes|required|numeric',
            'fat' => 'sometimes|required|numeric',
            'carbs' => 'sometimes|required|numeric',
            'serving_size' => 'nullable|string',
        ]);

        $food->update($data);
        return response()->json($food);
    }

    public function destroy($id)
    {
        $food = FoodItem::findOrFail($id);
        $food->delete();
        return response()->json(null, 204);
    }
}
