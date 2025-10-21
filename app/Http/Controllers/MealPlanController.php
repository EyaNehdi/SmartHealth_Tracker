<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealPlanRequest;
use App\Http\Requests\UpdateMealPlanRequest;
use App\Models\MealPlan;
use App\Models\MealPlanAssignment;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class MealPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mealPlans = MealPlan::with([
            'assignments.meal',
            'user'
        ])
            ->search($request->get('search'))
            ->byStatuses($request->get('statuses', []))
            ->byDaysRange($request->get('min_days'), $request->get('max_days'))
            ->orderBy('name', 'asc')
            ->paginate(12)
            ->appends($request->query());
        
        // Handle AJAX requests
        if ($request->ajax()) {
            return view('backoffice.meal-plans.partials.meal-plans-grid', compact('mealPlans'));
        }
        
        if (request()->expectsJson()) {
            return response()->json($mealPlans);
        }
        
        return view('backoffice.meal-plans.list', compact('mealPlans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $meals = Meal::select('id', 'name', 'description', 'meal_time', 'total_calories', 'total_protein')
            ->orderBy('name')
            ->get();

        return view('backoffice.meal-plans.meal-plan-form', compact('meals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMealPlanRequest $request)
    {
        Log::info('MealPlanController@store method called');
        
        $data = $request->validated();
        $data['created_by'] = Auth::id();

        Log::info('Meal Plan Store - Received data:', $data);

        DB::beginTransaction();
        try {
            // Create the meal plan
            $mealPlan = MealPlan::create($data);

            // Create meal assignments if provided
            if (isset($data['assignments']) && !empty($data['assignments'])) {
                foreach ($data['assignments'] as $assignment) {
                    Log::info('Meal Plan Store - Creating assignment:', $assignment);
                    MealPlanAssignment::create([
                        'meal_plan_id' => $mealPlan->id,
                        'meal_id' => $assignment['meal_id'],
                        'day_number' => $assignment['day_number'],
                        'meal_time' => $assignment['meal_time'],
                    ]);
                }
            }

            DB::commit();

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Meal plan created successfully',
                    'data' => $mealPlan->load('assignments.meal')
                ], 201);
            }

            return redirect()->route('admin.meal-plans.show', $mealPlan->id)->with('success', 'Meal plan created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Meal Plan Store Error:', ['error' => $e->getMessage()]);
            
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Failed to create meal plan'], 500);
            }
            
            return redirect()->back()->with('error', 'Failed to create meal plan.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mealPlan = MealPlan::with([
            'assignments.meal.foodItems', 
            'user'
        ])->findOrFail($id);
        
        if (request()->expectsJson()) {
            return response()->json($mealPlan);
        }
        
        return view('backoffice.meal-plans.show', compact('mealPlan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mealPlan = MealPlan::with(['assignments.meal'])->findOrFail($id);
        $meals = Meal::select('id', 'name', 'description', 'meal_time', 'total_calories', 'total_protein')
            ->orderBy('name')
            ->get();
        
        return view('backoffice.meal-plans.meal-plan-form', compact('mealPlan', 'meals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMealPlanRequest $request, $id)
    {
        $mealPlan = MealPlan::findOrFail($id);
        $data = $request->validated();

        Log::info('Meal Plan Update - Received data:', $data);

        DB::beginTransaction();
        try {
            // Update the meal plan
            $mealPlan->update($data);

            // Delete existing assignments
            $mealPlan->assignments()->delete();

            // Create new assignments if provided
            if (isset($data['assignments']) && !empty($data['assignments'])) {
                foreach ($data['assignments'] as $assignment) {
                    Log::info('Meal Plan Update - Creating assignment:', $assignment);
                    MealPlanAssignment::create([
                        'meal_plan_id' => $mealPlan->id,
                        'meal_id' => $assignment['meal_id'],
                        'day_number' => $assignment['day_number'],
                        'meal_time' => $assignment['meal_time'],
                    ]);
                }
            }

            DB::commit();

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Meal plan updated successfully',
                    'data' => $mealPlan->load('assignments.meal')
                ]);
            }

            return redirect()->route('admin.meal-plans.show', $mealPlan->id)->with('success', 'Meal plan updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Meal Plan Update Error:', ['error' => $e->getMessage()]);
            
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Failed to update meal plan'], 500);
            }
            
            return redirect()->back()->with('error', 'Failed to update meal plan.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mealPlan = MealPlan::findOrFail($id);
        
        DB::beginTransaction();
        try {
            // Delete assignments first (cascade should handle this, but being explicit)
            $mealPlan->assignments()->delete();
            
            // Delete the meal plan
            $mealPlan->delete();
            
            DB::commit();

            if (request()->expectsJson()) {
                return response()->json(['message' => 'Meal plan deleted successfully']);
            }

            return redirect()->route('admin.meal-plans.list')->with('success', 'Meal plan deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Meal Plan Delete Error:', ['error' => $e->getMessage()]);
            
            if (request()->expectsJson()) {
                return response()->json(['message' => 'Failed to delete meal plan'], 500);
            }
            
            return redirect()->back()->with('error', 'Failed to delete meal plan.');
        }
    }

    /**
     * Get meals for a specific day in a meal plan
     */
    public function getMealsForDay($id, Request $request)
    {
        $mealPlan = MealPlan::findOrFail($id);
        $dayNumber = $request->get('day_number');
        
        $meals = $mealPlan->getMealsForDay($dayNumber);
        
        return response()->json($meals);
    }

    /**
     * Get meals for a specific meal time in a meal plan
     */
    public function getMealsForMealTime($id, Request $request)
    {
        $mealPlan = MealPlan::findOrFail($id);
        $mealTime = $request->get('meal_time');
        
        $meals = $mealPlan->getMealsForMealTime($mealTime);
        
        return response()->json($meals);
    }

    /**
     * Toggle active status of a meal plan
     */
    public function toggleActive($id)
    {
        $mealPlan = MealPlan::findOrFail($id);
        $mealPlan->update(['is_active' => !$mealPlan->is_active]);

        if (request()->expectsJson()) {
            return response()->json([
                'message' => 'Meal plan status updated successfully',
                'data' => $mealPlan
            ]);
        }

        return redirect()->back()->with('success', 'Meal plan status updated successfully.');
    }

    /**
     * Remove a specific meal assignment from a meal plan
     */
    public function removeMealAssignment(Request $request, $mealPlanId, $assignmentId)
    {
        try {
            $mealPlan = MealPlan::findOrFail($mealPlanId);
            $assignment = MealPlanAssignment::where('meal_plan_id', $mealPlanId)
                ->where('id', $assignmentId)
                ->firstOrFail();
            
            $assignment->delete();

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Meal assignment removed successfully',
                    'data' => [
                        'meal_plan_id' => $mealPlan->id,
                        'assignment_id' => $assignmentId
                    ]
                ]);
            }

            return redirect()->back()->with('success', 'Meal assignment removed successfully.');
            
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to remove meal assignment',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to remove meal assignment.');
        }
    }

    // Frontoffice methods
    public function frontIndex(Request $request)
    {
        $query = MealPlan::with([
            'assignments.meal',
            'user'
        ])
            ->where('is_active', true)
            ->search($request->get('search'))
            ->byDaysRange($request->get('min_days'), $request->get('max_days'));

        // Apply ownership/saved filter
        if (Auth::check() && $request->get('filter')) {
            $query->byFilter($request->get('filter'), Auth::id());
        }

        $mealPlans = $query->orderBy('created_at', 'desc')
            ->paginate(12)
            ->appends($request->query());

        // Handle AJAX requests
        if ($request->ajax()) {
            return view('frontoffice.meal-plans._grid', compact('mealPlans'));
        }

        return view('frontoffice.meal-plans.index', compact('mealPlans'));
    }

    public function frontShow($id)
    {
        $mealPlan = MealPlan::with([
            'assignments.meal.foodItems',
            'user'
        ])->where('is_active', true)->findOrFail($id);

        return view('frontoffice.meal-plans.show', compact('mealPlan'));
    }

    public function frontCreate()
    {
        $meals = Meal::select('id', 'name', 'description', 'meal_time', 'total_calories', 'total_protein')
            ->orderBy('name')
            ->get();

        return view('frontoffice.meal-plans.create', compact('meals'));
    }

    public function frontStore(StoreMealPlanRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = Auth::id();
        $data['is_active'] = true;

        DB::beginTransaction();
        try {
            $mealPlan = MealPlan::create($data);

            if (isset($data['assignments']) && !empty($data['assignments'])) {
                foreach ($data['assignments'] as $assignment) {
                    MealPlanAssignment::create([
                        'meal_plan_id' => $mealPlan->id,
                        'meal_id' => $assignment['meal_id'],
                        'day_number' => $assignment['day_number'],
                        'meal_time' => $assignment['meal_time'],
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('meal-plans.front.show', $mealPlan->id)->with('success', 'Meal plan created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create meal plan.')->withInput();
        }
    }

    public function frontEdit($id)
    {
        $mealPlan = MealPlan::where('created_by', Auth::id())->with(['assignments.meal'])->findOrFail($id);
        $meals = Meal::select('id', 'name', 'description', 'meal_time', 'total_calories', 'total_protein')
            ->orderBy('name')
            ->get();
        
        return view('frontoffice.meal-plans.edit', compact('mealPlan', 'meals'));
    }

    public function frontUpdate(UpdateMealPlanRequest $request, $id)
    {
        $mealPlan = MealPlan::where('created_by', Auth::id())->findOrFail($id);
        $data = $request->validated();

        DB::beginTransaction();
        try {
            $mealPlan->update($data);
            $mealPlan->assignments()->delete();

            if (isset($data['assignments']) && !empty($data['assignments'])) {
                foreach ($data['assignments'] as $assignment) {
                    MealPlanAssignment::create([
                        'meal_plan_id' => $mealPlan->id,
                        'meal_id' => $assignment['meal_id'],
                        'day_number' => $assignment['day_number'],
                        'meal_time' => $assignment['meal_time'],
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('meal-plans.front.show', $mealPlan->id)->with('success', 'Meal plan updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update meal plan.')->withInput();
        }
    }

    public function frontDestroy($id)
    {
        $mealPlan = MealPlan::where('created_by', Auth::id())->findOrFail($id);
        
        DB::beginTransaction();
        try {
            $mealPlan->assignments()->delete();
            $mealPlan->delete();
            DB::commit();
            
            return redirect()->route('meal-plans.front.index')->with('success', 'Meal plan deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete meal plan.');
        }
    }

    // Save/Unsave functionality
    public function saveMealPlan(Request $request, $id)
    {
        $mealPlan = MealPlan::findOrFail($id);
        
        $saved = \App\Models\SavedMealPlan::firstOrCreate([
            'user_id' => Auth::id(),
            'meal_plan_id' => $id,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Meal plan saved successfully!',
                'saved' => true
            ]);
        }

        return redirect()->back()->with('success', 'Meal plan saved successfully!');
    }

    public function unsaveMealPlan(Request $request, $id)
    {
        \App\Models\SavedMealPlan::where('user_id', Auth::id())
            ->where('meal_plan_id', $id)
            ->delete();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Meal plan unsaved successfully!',
                'saved' => false
            ]);
        }

        return redirect()->back()->with('success', 'Meal plan unsaved successfully!');
    }

}