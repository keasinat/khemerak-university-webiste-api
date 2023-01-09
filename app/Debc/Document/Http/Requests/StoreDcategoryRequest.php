<?php

namespace App\Debc\Document\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDcategoryRequest extends FormRequest
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
            'title_km' => 'required|max:255|string',
            'slug' => 'nullable|string|unique:dcategories,slug',
            'parent_id' => 'integer|nullable'
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
