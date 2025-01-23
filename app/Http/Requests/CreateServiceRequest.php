<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use CodeZero\UniqueTranslation\UniqueTranslationRule;

class CreateServiceRequest extends FormRequest
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
            'title.*' => ['required', 'string', 'max:255', UniqueTranslationRule::for('services')],
            'slug.*' => ['required', 'string', 'max:255', UniqueTranslationRule::for('services')],
            'description_ar' => ['required', 'string'],
            'description_en' => ['required', 'string'],
            'meta_description_ar' => ['required', 'string', 'max:170'],
            'meta_description_en' => ['required', 'string', 'max:170'],
            'meta_keywords_ar' => ['required', 'string', 'max:1000'],
            'meta_keywords_en' => ['required', 'string', 'max:1000'],
            'meta_title_ar' => ['required', 'string', 'max:70'],
            'meta_title_en' => ['required', 'string', 'max:70'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'status' => ['required', 'boolean'],
        ];
    }
}
