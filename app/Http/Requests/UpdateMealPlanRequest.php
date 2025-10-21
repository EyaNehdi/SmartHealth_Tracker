<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMealPlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'total_days' => 'required|integer|min:1|max:365',
            'is_active' => 'boolean',
            'assignments' => 'nullable|array',
            'assignments.*.meal_id' => 'nullable|exists:meals,id',
            'assignments.*.day_number' => 'required|integer|min:1',
            'assignments.*.meal_time' => 'required|in:breakfast,snack,lunch,dinner',
        ];
    }
    
    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $data = [];
        
        // Handle is_active checkbox (unchecked checkboxes don't send value)
        $data['is_active'] = $this->has('is_active') ? true : false;
        
        // Filter out assignments without a meal_id (empty cells)
        if ($this->has('assignments')) {
            $assignments = collect($this->input('assignments'))
                ->filter(function ($assignment) {
                    return !empty($assignment['meal_id']);
                })
                ->values()
                ->toArray();
            
            $data['assignments'] = $assignments;
        }
        
        $this->merge($data);
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The meal plan name is required.',
            'total_days.required' => 'Total days is required.',
            'total_days.integer' => 'Total days must be a number.',
            'total_days.min' => 'Total days must be at least 1.',
            'total_days.max' => 'Total days cannot exceed 365.',
            'assignments.*.meal_id.required' => 'Each meal assignment must have a valid meal.',
            'assignments.*.meal_id.exists' => 'The selected meal does not exist.',
            'assignments.*.day_number.required' => 'Day number is required for each meal assignment.',
            'assignments.*.day_number.integer' => 'Day number must be a number.',
            'assignments.*.day_number.min' => 'Day number must be at least 1.',
            'assignments.*.meal_time.required' => 'Meal time is required for each assignment.',
            'assignments.*.meal_time.in' => 'Invalid meal time selected.',
        ];
    }
}