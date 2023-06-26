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
            'post_date' => 'date',
            'is_published' => 'boolean'
        ];
    }

    public function attributes()
    {
        return [
            'title_km' => trans('dashboard.document_name'),
            'file' => trans('dashboard.document.file'),
            'thumbnail' => trans('dashboard.document.thumbnail'),
            'post_date' => trans('dashboard.document.post_date_required'),
            'dcategory_id' => trans('dashboard.document_category'),
        ];
    }
}
