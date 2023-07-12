<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Permit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PermitSakitRequest extends FormRequest
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
            //
            
            'title' => 'required',
            'permit_image' => 'required|image|mimes:jpg|max:2048',
            'type' => 'required',
            'description' => 'required'
        ];
    }
}
