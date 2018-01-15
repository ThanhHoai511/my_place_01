<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:places,name',
            'dist_id' => 'required',
            'price_from' => 'required',
            'price_to' => 'required',
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => trans('validation.place-unique'),
            'name.required' => trans('validation.place-name-required'),
            'dist_id.required' => trans('validation.dist-required'),
            'price_from.required' => trans('validation.price-required'),
            'price_to.required' => trans('validation.price-required'),
            'image.required' => trans('validation.image-required'),
            'image.image' => trans('validation.image-wrong'),
        ];
    }
}
