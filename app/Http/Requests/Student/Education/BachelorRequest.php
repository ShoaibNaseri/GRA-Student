<?php

namespace App\Http\Requests\Student\Education;

use Illuminate\Foundation\Http\FormRequest;

class BachelorRequest extends FormRequest
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
            'universityName' => 'required',
            'address' => 'required',
            'gpa' => 'required',
            'feild' => 'required',
            'degreeType' => 'required',
            'startedDate' => 'required',
            'graduationDate' => 'nullable',
            'student_id' => 'required'
        ];
    }
}
