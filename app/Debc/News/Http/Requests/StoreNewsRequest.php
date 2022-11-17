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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'meta_keyword' => 'string|nullable',
            'meta_description' => 'string|nullable',
            'slug' => 'required|string',
            'is_published' => 'boolean|required',
            'post_date' => 'timestamps|nullable'
        ];
    }
}
