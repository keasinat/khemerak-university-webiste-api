<?php

namespace App\Debc\BusinessActivity\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
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
            'group' => 'required|integer|max:5',
            'sub_group' => 'integer|max:5',
            'code' => 'required|integer|max:7',
            'name_km' => 'required|string|max:255',
            'slug' => 'required|string',
            'm_name_km' => 'string|nullable|max:200',
        ];
    }

    public function messages()
    {
        return [];
    }

    public function attributes()
    {
        return [
            'group' => trans('dashboard.group_no'),
            'sub_group' => trans('dashboard.class_no'),
            'code' => trans('dashboard.subclass_no'),
            'name_km' => trans('dashboard.description'),
            'slug' => trans('dashboard.ministry_shortname'),
            'm_name_km' => trans('dashboard.ministry_fullname'),
        ];
    }
}
