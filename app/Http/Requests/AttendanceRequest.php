<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
            'name' => 'required|string',
            'attend_start' => 'required|date',
            'attend_end' => 'required|date',
            'time_start_deadline' => 'required|date_format:H:i',
            'time_start_gap_deadline' => 'required|date_format:H:i',
            'time_end_deadline' => 'required|date_format:H:i',
            'time_end_gap_deadline' => 'required|date_format:H:i',
            'data_id' => 'required',
        ];
    }
}
