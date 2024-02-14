<?php

namespace App\Debc\Event\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'title' => 'required|max:255|string',
            'event_category_id' => 'required',
            'content' => 'required',
            'description' => 'required',
            'thumbnail' => 'string|nullable',
            'location' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_published' => 'boolean'
        ];
    }

    public function attributes()
    {
        return [
            'title' => trans('dashboard.event_name'),
            'content' => trans('dashboard.document.content'),
            'description' => trans('dashboard.description'),
            'thumbnail' => trans('dashboard.thumbnail'),
            'location' => trans('dashboard.location'),
            'start_date' => trans('dashboard.start_date'),
            'end_date' => trans('dashboard.end_date'),
        ];
    }
}
