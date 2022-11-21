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
            'thumbnail' => 'string|nullable',
            'title_km' => 'required|string|max:255',
            'description_km' => 'required|string',
            'content_km' => 'required|string',
            'meta_keyword' => 'string|nullable',
            'meta_description' => 'string|nullable',
            'slug' => 'required|string',
            'is_published' => 'boolean|required',
        ];
    }
}
