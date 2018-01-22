<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required'
            'add' => 'required',
            'phone' => 'required',
            'birthday' => 'required|date',
            'password' => 'required|min:6',
            'email' => 'required|unique:users,email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.username-required'),
            'add.required' => trans('validation.add-required'),
            'phone.required' => trans('validation.phone-required'),
            'birthday.required' => trans('validation.birthday-required'),
            'birthday.date' => trans('validation.birthday-date'),
            'password.required' => trans('validation.pass-required'),
            'email.required' => trans('validation.email-required'),
            'email.unique' => trans('validation.email-unique'),
            'email.email' => trans('validation.email'),
            'password.min' => trans('validation.pass-min'),
        ];
    }
}
