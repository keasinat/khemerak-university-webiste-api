<?php

namespace App\Debc\Staff\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffRequest extends FormRequest
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
            'name_en' => 'required',
            'name_km' => 'required',
            'position_en' => 'required',
            'position_km' => 'required',
            'bio_en' => 'required',
            'bio_km' => 'required',
            'short_desc_en' => 'required',
            'short_desc_km' => 'required',

        ];
    }
}
