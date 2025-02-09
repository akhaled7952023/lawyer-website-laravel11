<?php

namespace App\Http\Requests;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
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
            'title.*' => ['required', 'string', 'max:255', UniqueTranslationRule::for('articles')],
            'slug.*' => ['required', 'string', 'max:255', UniqueTranslationRule::for('articles')],
            'content_ar' => ['required', 'string'],
            'content_en' => ['required', 'string'],
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
