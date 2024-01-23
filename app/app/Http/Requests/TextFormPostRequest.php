<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TextFormPostRequest extends FormRequest
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
            'title.required' => 'Пожалуйста, введите описание(не более 50 символов)!',
            'text.required'  => 'Пожалуйста, введите текст!',
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
            'title' => 'required|max:50',
            'text' => 'required',
        ];
    }
}
