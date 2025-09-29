<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    // List all meals
    public function index()
    {
        $meals = Meal::with('foodItems')->get();
        return response()->json($meals);
    }

    // Show a specific meal
    public function show($id)
    {
        $meal = Meal::with('foodItems')->findOrFail($id);
        return response()->json($meal);
    }

    // Create new meal
    public function store(Request $request)
    {
        $data = $request->validate([
            'created_by' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'meal_date' => 'required|date',
            'food_items' => 'array',
            'food_items.*.food_id' => 'required|exists:food_items,id',
            'food_items.*.quantity' => 'required|numeric',
            'food_items.*.unit' => 'nullable|string',
        ]);

        $meal = Meal::create($data);

        if (!empty($data['food_items'])) {
            foreach ($data['food_items'] as $item) {
                $meal->foodItems()->attach($item['food_id'], [
                    'quantity' => $item['quantity'],
                    'unit' => $item['unit'] ?? null,
                ]);
            }
        }

        return response()->json($meal->load('foodItems'), 201);
    }

    // Update meal info and food items
    public function update(Request $request, $id)
    {
        $meal = Meal::findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'meal_date' => 'sometimes|required|date',
            'food_items' => 'array',
            'food_items.*.food_id' => 'required|exists:food_items,id',
            'food_items.*.quantity' => 'required|numeric',
            'food_items.*.unit' => 'nullable|string',
        ]);

        $meal->update($data);

        if (isset($data['food_items'])) {
            $meal->foodItems()->detach();

            foreach ($data['food_items'] as $item) {
                $meal->foodItems()->attach($item['food_id'], [
                    'quantity' => $item['quantity'],
                    'unit' => $item['unit'] ?? null,
                ]);
            }
        }

        return response()->json($meal->load('foodItems'));
    }

    // Delete a meal
    public function destroy($id)
    {
        $meal = Meal::findOrFail($id);
        $meal->foodItems()->detach();
        $meal->delete();
        return response()->json(null, 204);
    }
}
