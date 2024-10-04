<?php

namespace App\Debc\News\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNcategoryRequest extends FormRequest
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
            'title_km' => 'max:255|string|required',
            'title_en' => 'max:255|string|nullable',
            'slug' => [
                'required',
                Rule::unique('ncategories','slug')->ignore($this->ncategory)
            ],
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
