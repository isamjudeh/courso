<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterationStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'birth_date' => ['required'],
            'phone' => ['required', 'string'],
            'sex' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'address' => ['required', 'string'],
            'socail_status' => ['required', 'string'],
            'certificate_type' => ['required', 'string'],
            'registered_before' => ['required'],
            'approved' => ['required'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'course_id' => ['required', 'integer', 'exists:courses,id'],
        ];
    }
}
