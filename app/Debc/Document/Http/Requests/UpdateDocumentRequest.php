<?php

namespace App\Debc\Document\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
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
            'file' => 'string',
            'dcategory_id' => 'integer',
            'thumbnail' => 'string',
        ];
    }

    public function attributes()
    {
        return [
            'title_km' => trans('dashboard.document_name')
        ];
    }
}
