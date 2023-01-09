<?php

namespace App\Debc\Document\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\YoutubeUrl;

class StoreVideoRequest extends FormRequest
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
            'title_km' => 'required|max:255|string',
            'file' => ['required','url', new YoutubeUrl],
            'thumbnail' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title_km' => trans('dashboard.document.video_name'),
            'file' => trans('dashboard.document.video'),
            'thumbnail' => trans('dashboard.thumbnail')
        ];
    }

    public function messages()
    {
        return [
            'file.required' => trans('dashboard.document.video')
        ];
    }
}
