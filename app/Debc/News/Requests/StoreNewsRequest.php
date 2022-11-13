<?php

namespace App\Debc\News\Requests;

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
            'title' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'meta_keyword' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'slug' => 'required|string',
            'is_published' => 'boolean|required',
        ];
    }
}
