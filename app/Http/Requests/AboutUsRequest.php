<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
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
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'number' => 'required|string',
            'about_us_ar' => 'required|string|max:500',
            'about_us_en' => 'required|string|max:500',
            'content' => 'required|array',
            'content.*.title_ar' => 'required|string|max:255',
            'content.*.title_en' => 'required|string|max:255',
            'content.*.description_ar' => 'required|string|max:500',
            'content.*.description_en' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }
}
