<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Models\FoodItem;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    // For JSON API
    public function index()
    {
        $foods = FoodItem::with('meals')->get();
        return response()->json($foods);
    }

    public function show($id)
    {
        $food = FoodItem::with('meals')->findOrFail($id);
        return response()->json($food);
    }

    // For Blade view display
    public function foodList(Request $request)
    {
        $foods = FoodItem::query()
            ->search($request->get('search'))
            ->byCaloriesRange($request->get('calories_min'), $request->get('calories_max'))
            ->byProteinRange($request->get('protein_min'), $request->get('protein_max'))
            ->byFatRange($request->get('fat_min'), $request->get('fat_max'))
            ->byCarbsRange($request->get('carbs_min'), $request->get('carbs_max'))
            ->orderBy('name', 'asc')
            ->paginate(12)
            ->appends($request->query());
        
        // Handle AJAX requests
        if ($request->ajax()) {
            return view('backoffice.food.partials.food-grid', compact('foods'));
        }
        
        return view('backoffice.food.food-list', compact('foods'));
    }

    public function store(StoreFoodRequest $request)
    {
        $data = $request->validated();

        // Handle serving type - use custom_serving_type if provided, otherwise use serving_type
        if (!empty($data['custom_serving_type'])) {
            $data['serving_type'] = $data['custom_serving_type'];
        }
        unset($data['custom_serving_type']);

        // Check if image uploaded
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('food_images', 'public');
            $data['image'] = $imagePath; // store path in db
        }

        $food = FoodItem::create($data);
        
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Food item created successfully',
                'data' => $food->load('meals')
            ], 201);
        }
        
        return redirect()->route('admin.food.show', $food->id)->with('success', 'Food item created successfully!');
    }
    public function showView($id)
    {
        $food = FoodItem::findOrFail($id);
        return view('backoffice.food.food-show', compact('food'));
    }

    // Show edit form of food
    public function edit($id)
    {
        $food = FoodItem::findOrFail($id);
        return view('backoffice.food.edit-food', compact('food'));
    }

    // Update food from web form, redirect after update
    public function update(UpdateFoodRequest $request, $id)
    {
        $food = FoodItem::findOrFail($id);

        $validatedData = $request->validated();

        // Handle serving type - use custom_serving_type if provided, otherwise use serving_type
        if (!empty($validatedData['custom_serving_type'])) {
            $validatedData['serving_type'] = $validatedData['custom_serving_type'];
        }
        unset($validatedData['custom_serving_type']);

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
