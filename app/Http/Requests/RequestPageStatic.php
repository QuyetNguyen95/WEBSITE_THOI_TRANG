<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPageStatic extends FormRequest
{


    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'ps_name'    => 'required',
            'ps_type'    => 'required',
            'ps_content' => 'required'
        ];
    }

    public function messages()

    {
        return [
            'ps_name.required'    => 'Trường này không được để trống',
            'ps_type.required'    => 'Trường này không được để trống',
            'ps_content.required' => 'Trường này không được để trống'
        ];
    }
}
