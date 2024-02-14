<?php

namespace App\Debc\Event\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEcategoryRequest extends FormRequest
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
            'name' => 'max:255|string|required',
            'slug' => [
                'required',
                Rule::unique('event_categories','slug')->ignore($this->ecategory)
            ],
            'parent_id' => 'integer|nullable'
        ];
    }
    public function attributes()
    {
        return [
            'name' => trans('dashboard.event_name'),
            'slug' => trans('dashboard.slug'),
            'parent_id' => trans('dashboard.event_categories'),
        ];
    }
    
}
