<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    // For JSON API
    public function apiIndex()
    {
        $foods = FoodItem::all();
        return response()->json($foods);
    }

    // For Blade view display
    public function foodList()
    {
        $foods = FoodItem::all();
        return view('admin.food.food-list', compact('foods'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if image uploaded
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('food_images', 'public');
            $data['image'] = $imagePath; // store path in db
        }

        $food = FoodItem::create($data);
        return redirect()->route('admin.food.list')->with('success', 'Food item added successfully.');
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
