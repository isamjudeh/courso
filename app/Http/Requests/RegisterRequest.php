<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
            'phone' => ['required', 'unique:users,phone'],
            'birth_date' => ['required'],
            'sex' => ['required'],
            'nationality' => ['required'],
            'address' => ['required'],
            'socail_status' => ['required'],
            'education_status' => ['required'],
        ];
    }
}
