<?php

namespace App\Http\Requests\Student\Credential;

use Illuminate\Foundation\Http\FormRequest;

class CredentialUpdate extends FormRequest
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
            'country' => 'required',
            'degree' => 'required',
            'feild' => 'required',
            'applingFor' => 'required',
            'bugdet' => 'required',
            'language' => 'required',
            'score' => 'nullable'
        ];
    }
}
