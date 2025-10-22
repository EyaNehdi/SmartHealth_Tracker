<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Models\FoodItem;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealController extends Controller
{
    // List all meals
    public function index()
    {
        $meals = Meal::with('foodItems')->get();
        return response()->json($meals);
    }

    public function listView(Request $request)
    {
        $meals = Meal::with('foodItems')
            ->search($request->get('search'))
            ->byMealTimes($request->get('meal_times', []))
            ->byCaloriesRange($request->get('calories_min'), $request->get('calories_max'))
            ->byPreparationTimeRange($request->get('prep_time_min'), $request->get('prep_time_max'))
            ->orderBy('name', 'asc')
            ->paginate(12)
            ->appends($request->query());

        // Handle AJAX requests
        if ($request->ajax()) {
            return view('backoffice.meals.partials.meals-grid', compact('meals'));
        }

        return view('backoffice.meals.list', compact('meals'));
    }


    public function showView($id)
    {
        $meal = Meal::with('foodItems')->findOrFail($id);
        $availableFoodItems = FoodItem::whereNotIn('id', $meal->foodItems->pluck('id'))->get();

        if (request()->ajax()) {
            return view('backoffice.meals.partials.food-items-list', compact('meal'));
        }

        return view('backoffice.meals.show', compact('meal', 'availableFoodItems'));
    }

    // Show form to create a new meal
    public function create()
    {
        $foodItems = FoodItem::all();
        return view('backoffice.meals.create', compact('foodItems'));
    }



    // Show edit form
    public function edit($id)
    {
        $meal = Meal::with('foodItems')->findOrFail($id);
        $foodItems = FoodItem::all();
        return view('backoffice.meals.edit', compact('meal', 'foodItems'));
    }

    public function store(StoreMealRequest $request)
    {
        $data = $request->validated();

        $data['created_by'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('meal_images', 'public');
        }

        // Handle recipe attachment (file or URL)
        if ($request->hasFile('recipe_attachment')) {
            $data['recipe_attachment'] = $request->file('recipe_attachment')->store('recipe_attachments', 'public');
        } elseif ($request->filled('recipe_url')) {
            $data['recipe_attachment'] = $request->recipe_url;
        }

        $meal = Meal::create($data);

        if (!empty($data['food_items'])) {
            foreach ($data['food_items'] as $item) {
                $meal->foodItems()->attach($item['food_id'], [
                    'quantity' => $item['quantity'],
                    'unit' => $item['unit'] ?? null,
                ]);
            }
        }

        // Update nutritional totals after attaching food items
        $meal->updateNutritionalTotals();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Meal created successfully',
                'data' => $meal->load('foodItems')
            ], 201);
        }

        return redirect()->route('admin.meals.list')->with('success', 'Meal created successfully.');
    }

    public function update(UpdateMealRequest $request, $id)
    {
        $meal = Meal::findOrFail($id);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('meal_images', 'public');
        }

        // Handle recipe attachment (file or URL)
        if ($request->hasFile('recipe_attachment')) {
            $data['recipe_attachment'] = $request->file('recipe_attachment')->store('recipe_attachments', 'public');
        } elseif ($request->filled('recipe_url')) {
            $data['recipe_attachment'] = $request->recipe_url;
        }

        $meal->update($data);

        // Update food items relationship
        $meal->foodItems()->detach();

        if (isset($data['food_items'])) {
            foreach ($data['food_items'] as $item) {
                $meal->foodItems()->attach($item['food_id'], [
                    'quantity' => $item['quantity'],
                    'unit' => $item['unit'] ?? null,
                ]);
            }
        }

        // Update nutritional totals after updating food items
        $meal->updateNutritionalTotals();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Meal updated successfully',
                'data' => $meal->load('foodItems')
            ]);
        }

        return redirect()->route('admin.meals.show', $meal->id)->with('success', 'Meal updated successfully.');
    }

    // Delete a meal
    public function destroy($id)
    {
        $meal = Meal::findOrFail($id);
        $meal->foodItems()->detach();
        $meal->delete();
        return redirect()->route('admin.meals.list')->with('success', 'Meal deleted successfully.');
    }

    // Add ingredient to meal
    public function addIngredient(Request $request, $id)
    {
        $meal = Meal::findOrFail($id);
        
        $request->validate([
            'food_item_id' => 'required|exists:food_items,id',
            'quantity' => 'required|numeric|min:0.1',
            'unit' => 'nullable|in:g,kg,ml,l,pieces,cups,tbsp,tsp,oz,lb',
        ]);

        // Check if food item is already in the meal
        if ($meal->foodItems()->where('food_id', $request->food_item_id)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'This food item is already in the meal.'
            ], 400);
        }

        $meal->foodItems()->attach($request->food_item_id, [
            'quantity' => $request->quantity,
            'unit' => $request->unit ?? 'g',
        ]);

        // Update nutritional totals
        $meal->updateNutritionalTotals();

        // Handle AJAX requests
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Food item added successfully.'
            ]);
        }

        // Redirect for regular form submissions
        return redirect()->route('admin.meals.show', $meal->id)->with('success', 'Food item added successfully.');
    }

    // Remove ingredient from meal
    public function removeIngredient($mealId, $foodItemId)
    {
        $meal = Meal::findOrFail($mealId);
        
        $meal->foodItems()->detach($foodItemId);
        
        // Update nutritional totals
        $meal->updateNutritionalTotals();

        // Handle AJAX requests
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Food item removed successfully.'
            ]);
        }

        // Redirect for regular form submissions
        return redirect()->route('admin.meals.show', $meal->id)->with('success', 'Food item removed successfully.');
    }

    // Get ingredients list (for AJAX)
    public function ingredientsList($id)
    {
        $meal = Meal::with('foodItems')->findOrFail($id);
        
        return view('backoffice.meals.partials.ingredients-list', compact('meal'));
    }

    // Frontoffice methods
    public function frontIndex(Request $request)
    {
        $query = Meal::with('foodItems')
            ->search($request->get('search'))
            ->byMealTimes($request->get('meal_times', []))
            ->byCaloriesRange($request->get('calories_min'), $request->get('calories_max'))
            ->byPreparationTimeRange($request->get('prep_time_min'), $request->get('prep_time_max'));

        // Apply ownership/saved filter
        if (Auth::check() && $request->get('filter')) {
            $query->byFilter($request->get('filter'), Auth::id());
        }

        $meals = $query->orderBy('created_at', 'desc')
            ->paginate(12)
            ->appends($request->query());

        // Handle AJAX requests
        if ($request->ajax()) {
            return view('frontoffice.meals._grid', compact('meals'));
        }

        return view('frontoffice.meals.index', compact('meals'));
    }

    public function frontShow($id)
    {
        $meal = Meal::with('foodItems')->findOrFail($id);
        
        return view('frontoffice.meals.show', compact('meal'));
    }

    public function frontCreate()
    {
        $foodItems = FoodItem::orderBy('name')->get();
        return view('frontoffice.meals.create', compact('foodItems'));
    }

    public function frontStore(StoreMealRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('meal_images', 'public');
        }

        if ($request->hasFile('recipe_attachment')) {
            $data['recipe_attachment'] = $request->file('recipe_attachment')->store('recipe_attachments', 'public');
        } elseif ($request->filled('recipe_url')) {
            $data['recipe_attachment'] = $request->recipe_url;
        }

        $meal = Meal::create($data);

        if (!empty($data['food_items'])) {
            foreach ($data['food_items'] as $item) {
                $meal->foodItems()->attach($item['food_id'], [
                    'quantity' => $item['quantity'],
                    'unit' => $item['unit'] ?? null,
                ]);
            }
        }

        $meal->updateNutritionalTotals();

        return redirect()->route('meals.front.show', $meal->id)->with('success', 'Meal created successfully!');
    }

    public function frontEdit($id)
    {
        $meal = Meal::where('created_by', Auth::id())->with('foodItems')->findOrFail($id);
        $foodItems = FoodItem::orderBy('name')->get();
        return view('frontoffice.meals.edit', compact('meal', 'foodItems'));
    }

    public function frontUpdate(UpdateMealRequest $request, $id)
    {
        $meal = Meal::where('created_by', Auth::id())->findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('meal_images', 'public');
        }

        if ($request->hasFile('recipe_attachment')) {
            $data['recipe_attachment'] = $request->file('recipe_attachment')->store('recipe_attachments', 'public');
        } elseif ($request->filled('recipe_url')) {
            $data['recipe_attachment'] = $request->recipe_url;
        }

        $meal->update($data);
        $meal->foodItems()->detach();

        if (isset($data['food_items'])) {
            foreach ($data['food_items'] as $item) {
                $meal->foodItems()->attach($item['food_id'], [
                    'quantity' => $item['quantity'],
                    'unit' => $item['unit'] ?? null,
                ]);
            }
        }

        $meal->updateNutritionalTotals();

        return redirect()->route('meals.front.show', $meal->id)->with('success', 'Meal updated successfully!');
    }

    public function frontDestroy($id)
    {
        $meal = Meal::where('created_by', Auth::id())->findOrFail($id);
        $meal->foodItems()->detach();
        $meal->delete();
        
        return redirect()->route('meals.front.index')->with('success', 'Meal deleted successfully!');
    }

    // Save/Unsave functionality
    public function saveMeal(Request $request, $id)
    {
        $meal = Meal::findOrFail($id);
        
        $saved = \App\Models\SavedMeal::firstOrCreate([
            'user_id' => Auth::id(),
            'meal_id' => $id,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Meal saved successfully!',
                'saved' => true
            ]);
        }

        return redirect()->back()->with('success', 'Meal saved successfully!');
    }

    public function unsaveMeal(Request $request, $id)
    {
        \App\Models\SavedMeal::where('user_id', Auth::id())
            ->where('meal_id', $id)
            ->delete();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Meal unsaved successfully!',
                'saved' => false
            ]);
        }

        return redirect()->back()->with('success', 'Meal unsaved successfully!');
    }
}
