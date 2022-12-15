<?php

namespace App\Debc\Document\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDcategoryRequest extends FormRequest
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
            'slug' => [
                'required',
                Rule::unique('dcategories','slug')->ignore($this->dcategory)
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
