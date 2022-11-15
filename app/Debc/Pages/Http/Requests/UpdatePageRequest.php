<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
            'title_km' => 'max:255|string',
            'slug' => 'nullable|string',
            'content_km' => 'required',
            'is_published' => 'boolean',
            'meta_keyword' => 'string|nullable',
            'meta_description' => 'string|nullable'
        ];
    }

    public function attributes()
    {
        return [
            'title_km' => trans('dashboard.page_name')
        ];
    }
}
