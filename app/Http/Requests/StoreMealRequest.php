<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMealRequest extends FormRequest
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
            'notes' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'meal_time' => 'required|' . config('meal_times.validation_rule'),
            'preparation_time' => 'nullable|integer|min:0|max:1440', // Max 24 hours
            'recipe_description' => 'nullable|string',
            'recipe_attachment' => 'nullable|file|mimes:pdf,doc,docx,txt|max:10240', // 10MB max
            'tags' => 'nullable|string|max:500',
            'food_items' => 'required|array|min:1',
            'food_items.*.food_id' => 'required|exists:food_items,id',
            'food_items.*.quantity' => 'required|numeric|min:0.01',
            'food_items.*.unit' => 'nullable|string|max:50',
        ];
    }
}
