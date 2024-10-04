<?php

namespace App\Debc\News\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Debc\News\Models\News;

class StoreNewsRequest extends FormRequest
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
            'thumbnail' => 'required|string',
            'title_km' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'description_km' => 'required|string|max:255',
            'description_en' => 'nullable|string|max:255',
            'content_km' => 'required|string',
            'content_en' => 'required|string',
            'meta_keyword' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'slug' => 'nullable|string',
            'is_published' => 'boolean|required',
            'ncategory_id' => 'required|integer'
        ];
    }

    // public function attributes()
    // {
    //     return [
    //         'title_km' => trans('dashboard.title'),
    //         'description_km' => trans('dashboard.description'),
    //         'content_km' => trans('dashboard.content')
    //     ];
    // }
}
