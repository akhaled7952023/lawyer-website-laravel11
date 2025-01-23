<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'main_email' => 'required|email',
            'secondary_email' => 'nullable|email',
            'logo' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
            'phone_mobile' => 'required|regex:/^(\+?\d{1,4}?)?(\d{10})$/',
            'landline_phone' => 'nullable|regex:/^(\+?\d{1,4}?)?(\d{10})$/',
            'adress_ar' => 'required|string|max:255',
            'adress_en' => 'required|string|max:255',
            'map' => 'nullable|string',
            'about_ar' => 'required|string|max:500',
            'about_en' => 'required|string|max:500',
            'social_links' => 'nullable|array',
            'social_links.*' => 'required|array',
            'social_links.*.link' => 'required|url',
            'social_links.*.icon' => 'required|string',

        ];
    }
}
