<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
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
            'title' => 'required',
            'timewrite' => 'required',
            'rateservice' => 'required',
            'ratequality' => 'required',
            'submary' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('validation.title-required'),
            'timewrite.required' => trans('validation.timewrite-required'),
            'rateservice.required' => trans('validation.rateservice-required'),
            'ratequality.required' => trans('validation.ratequality-required'),
            'submary.required' => trans('validation.submary-required'),
        ];
    }
}
