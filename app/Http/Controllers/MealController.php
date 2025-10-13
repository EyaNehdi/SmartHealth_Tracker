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
        $query = Meal::with('foodItems');

        if ($search = $request->query('search')) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $meals = $query->get();

        if ($request->ajax()) {
            return view('backoffice.meals.partials.meals-table-rows', compact('meals'));
        }

        return view('backoffice.meals.list', compact('meals'));
    }


    public function showView($id)
    {
        $meal = Meal::with('foodItems')->findOrFail($id);

        if (request()->ajax()) {
            return view('backoffice.meals.partials.food-items-list', compact('meal'));
        }

        return view('backoffice.meals.show', compact('meal'));
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

        $meal = Meal::create($data);

        if (!empty($data['food_items'])) {
            foreach ($data['food_items'] as $item) {
                $meal->foodItems()->attach($item['food_id'], [
                    'quantity' => $item['quantity'],
                    'unit' => $item['unit'] ?? null,
                ]);
            }
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
}
