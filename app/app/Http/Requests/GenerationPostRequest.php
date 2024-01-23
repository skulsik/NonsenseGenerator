<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerationPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages()
    {
        return [
            'num_sentences.required' => 'Пожалуйста, введите число предложений!',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'num_sentences' => 'required|gt:1',
        ];
    }
}
