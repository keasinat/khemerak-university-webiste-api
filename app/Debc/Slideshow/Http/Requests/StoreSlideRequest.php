<?php

namespace App\Debc\Slideshow\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlideRequest extends FormRequest
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
            'thumbnail' => 'required',
            'headline_km' => 'nullable|string',
            'headline_en' => 'nullable|string',
            'content_km' => 'nullable|string',
            'content_en' => 'nullable|string',
            'btn_label_km' => 'nullable|string',
            'btn_label_en' => 'nullable|string',
            'link' => 'nullable|url:http,https',

        ];
    }
}
