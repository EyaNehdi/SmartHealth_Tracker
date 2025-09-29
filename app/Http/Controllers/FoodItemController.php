<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
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

    public function store(StoreFoodRequest $request)
    {
        $data = $request->validated();

        // Check if image uploaded
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('food_images', 'public');
            $data['image'] = $imagePath; // store path in db
        }

        $food = FoodItem::create($data);
        return redirect()->route('admin.food.list')->with('success', 'Food item added successfully.');
    }
    public function showView($id)
    {
        $food = FoodItem::findOrFail($id);
        return view('admin.food.food-show', compact('food'));
    }

    // Show edit form of food
    public function edit($id)
    {
        $food = FoodItem::findOrFail($id);
        return view('admin.food.edit-food', compact('food'));
    }

    // Update food from web form, redirect after update
    public function update(UpdateFoodRequest $request, $id)
    {
        $food = FoodItem::findOrFail($id);

        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('food_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $food->update($validatedData);

        return redirect()->route('admin.food.show', $food->id)->with('success', 'Food item updated successfully.');
    }

    public function destroy($id)
    {
        $food = FoodItem::findOrFail($id);
        $food->delete();

        return redirect()->route('admin.food.list')->with('success', 'Food item deleted successfully.');
    }
}
