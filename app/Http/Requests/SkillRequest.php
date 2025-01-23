<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
            'title_ar' => ['required', 'string', 'max:700'],
            'title_en' => ['required', 'string', 'max:700'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'skills' => 'required|array',
            'skills.*.name_ar' => 'required|string|max:500',
            'skills.*.name_en' => 'required|string|max:500',
            'skills.*.percentage' => 'required|integer|between:0,100',
            'counters' => 'required|array',
            'counters.*.name_ar' => 'required|string|max:500',
            'counters.*.name_en' => 'required|string|max:500',
            'counters.*.value' => 'required|string|max:500',
        ];
    }
}
