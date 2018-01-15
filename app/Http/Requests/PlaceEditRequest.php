<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceEditRequest extends FormRequest
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
            'name' => 'required',
            'dist_id' => 'required',
            'price_from' => 'required',
            'price_to' => 'required',
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.place-name-required'),
            'dist_id.required' => trans('validation.dist-required'),
            'price_from.required' => trans('validation.price-required'),
            'price_to.required' => trans('validation.price-required'),
            'image.required' => trans('validation.image-required'),
            'image.image' => trans('validation.image-wrong'),
        ];
    }
}
