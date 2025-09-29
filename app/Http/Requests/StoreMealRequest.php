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
            'meal_type' => 'required|string',
            'notes' => 'nullable|string',
            'image' => 'nullable|image|max:2048', 
            'food_items' => 'array',
            'food_items.*.food_id' => 'required|exists:food_items,id',
            'food_items.*.quantity' => 'required|numeric',
            'food_items.*.unit' => 'nullable|string',
        ];
    }
}
