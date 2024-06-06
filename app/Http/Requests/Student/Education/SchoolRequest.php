<?php

namespace App\Http\Requests\Student\Education;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
            //
            'student_id' => 'required',
            'schoolName' => 'required',
            'schoolType' => 'required',
            'address' => 'required',
            'startedDate' => 'required',
            'graduationDate' => 'required',
            'percentage' => 'required',
        ];
    }
}
