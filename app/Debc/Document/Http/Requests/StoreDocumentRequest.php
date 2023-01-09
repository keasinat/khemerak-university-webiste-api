<?php

namespace App\Debc\Document\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
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
            'title_km' => 'required|max:255|string',
            'file' => 'required',
            'dcategory_id' => 'required',
            'thumbnail' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title_km' => trans('dashboard.document_name')
        ];
    }
}
