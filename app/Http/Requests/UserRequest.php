<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'avatar' => 'mimes:jpg,jpeg,png|max:2048',
            'username' => 'min:5|unique:users,username',
            'password' => 'min:8',
            'nip' => 'unique:users,nip|max:10'
        ];
    }

    public function messages(): array
    {
        return [
            'avatar.mimes' => 'Format foto salah',
            'avatar.max' => 'Ukuran foto terlalu besar',
            'username.min' => 'Username minimal :min karakter',
            'username.unique' => 'Username sudah digunakan',
            'password.min' => 'Password minimal :min karakter',
            'nip.unique' => 'NIP sudah digunakan',
            'nip.max' => 'NIP maksimal 10 karakter'
        ];
    }
}
