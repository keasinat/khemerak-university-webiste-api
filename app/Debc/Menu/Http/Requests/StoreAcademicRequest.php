<?php

namespace App\Debc\Menu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAcademicRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title_km' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'slug' => 'nullable|string|unique:academics,slug',
            'parent_id' => 'integer|nullable',
            'thumbnail' => 'nullable|string',
            'description_km' => 'nullable|string|max:255',
            'description_en' => 'nullable|string|max:255',
            'is_top' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
            'is_single_page' => 'nullable|boolean'
        ];
    }

    public function attributes()
    {
        return [
            'title_km' => trans('dashboard.category_name'),
            'parent_id' => trans('dashboard.document_category')
        ];
    }
}
