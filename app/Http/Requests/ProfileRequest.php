<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'. auth()->user()->id,
            'dob'   => 'required|date|max:255',
            'education_level' => 'required|string|max:255',
            'gender'          => 'required|string|max:255',
            'profile_image'   => 'nullable|image|max:1000|mimes:jpeg,png,jpg',
            'expected_retirement_age' => 'required|numeric|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'name'  => trans('lang.register_form.name'),
            'email' => trans('lang.user.email_address'),
            'dob'   => trans('lang.register_form.dob'),
            'education_level' => trans('lang.question.education_level'),
            'gender'          => trans('lang.register_form.gender'),
            'profile_image'   => trans('lang.register_form.profile_image'),
            'expected_retirement_age' => trans('lang.user.Expected Retirement Age'),
        ];
    }
}
