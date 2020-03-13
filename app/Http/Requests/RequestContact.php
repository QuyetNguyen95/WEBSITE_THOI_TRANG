<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestContact extends FormRequest
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
            'c_name'  => 'required',
            'c_email'  => 'required',
            'c_title'  => 'required',
            'c_content'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'c_name.required'     => 'Trường này không được để trống',
            'c_email.required'     => 'Trường này không được để trống',
            'c_title.required' => 'Trường này không được để trống',
            'c_content.required' => 'Trường này không được để trống'
        ];
    }
}
