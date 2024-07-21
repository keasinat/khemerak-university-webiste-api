<?php

namespace App\Debc\Menu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSubjectRequest extends FormRequest
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
            'title_km' => 'max:255|string|required',
            'academic_id' => 'required|integer',
            'title_en' => 'nullable|string|max:255',
            'slug' => [
                'required',
                Rule::unique('academics','slug')->ignore($this->academic)
            ],
            'thumbnail' => 'nullable|string',
            'description_km' => 'nullable|string|max:255',
            'description_en' => 'nullable|string|max:255',
            'is_top' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
            'highlight_km' => 'nullable|string|max:255',
            'highlight_en' => 'nullable|string|max:255'
        ];
    }

    // public function attributes()
    // {

    // }
}
