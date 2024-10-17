<?php

namespace App\Debc\Menu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_km' => 'required|string|max:255',
            'academic_id' => 'required|integer',
            'title_en' => 'nullable|string|max:255',
            'slug' => 'required|string|unique:subjects,slug',
            'thumbnail' => 'nullable|string',
            'description_km' => 'nullable|string',
            'description_en' => 'nullable|string',
            'is_top' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
            'highlight_km' => 'nullable|string|max:255',
            'highlight_en' => 'nullable|string|max:255',
            'radius' => 'in:rounded,rounded-circle|required'
        ];
    }
}
