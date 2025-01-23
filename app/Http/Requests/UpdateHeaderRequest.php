<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHeaderRequest extends FormRequest
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
            'firstsolgan_ar' => ['required', 'string', 'max:500'],
            'firstsolgan_en' => ['required', 'string', 'max:500'],
            'secondsolgan_ar' => ['required', 'string', 'max:500'],
            'secondsolgan_en' => ['required', 'string', 'max:500'],
            'textbutton_ar' => ['required', 'string', 'max:500'],
            'textbutton_en' => ['required', 'string', 'max:500'],
            'link' => ['required', 'url', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'features' => 'required|array',
            'features.*.text_ar' => 'required|string|max:255',
            'features.*.text_en' => 'required|string|max:255',
            'features.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
