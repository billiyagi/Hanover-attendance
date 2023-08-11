<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name'          =>  'required|string',
            // 'username'      =>  'required|string|unique:users|min:5',
            // 'email'         =>  'required|email|unique:users',
            // 'password'      =>  'required|string|min:8',
            // 'foto'          =>  'required|mimes:jpg,jpeg,png|max:1048',
            'role'          =>  'required|in:1,2',
        ];
    }
}
