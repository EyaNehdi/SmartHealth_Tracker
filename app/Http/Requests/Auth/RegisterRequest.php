<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:8', 'regex:/^(?=.*\d).+$/'],
            'preference' => ['required', 'string', 'in:Relaxation,Cardio,Renforcement musculaire,Flexibilité,Endurance'],
            'terms_accepted' => ['required', 'accepted'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'name.min' => 'Le nom doit contenir au moins 2 caractères.',
            
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.string' => 'L\'adresse email doit être une chaîne de caractères.',
            'email.lowercase' => 'L\'adresse email doit être en minuscules.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.max' => 'L\'adresse email ne peut pas dépasser 255 caractères.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.regex' => 'Le mot de passe doit contenir au moins un chiffre.',
            
            'preference.required' => 'La préférence d\'activité est obligatoire.',
            'preference.string' => 'La préférence doit être une chaîne de caractères.',
            'preference.in' => 'La préférence sélectionnée n\'est pas valide.',
            
            'terms_accepted.required' => 'Vous devez accepter les conditions d\'utilisation.',
            'terms_accepted.accepted' => 'Vous devez accepter les conditions d\'utilisation.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'nom',
            'email' => 'adresse email',
            'password' => 'mot de passe',
            'password_confirmation' => 'confirmation du mot de passe',
            'preference' => 'préférence d\'activité',
            'terms_accepted' => 'conditions d\'utilisation',
        ];
    }
}
