<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateUser extends FormRequest
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
            'name'             => 'required|min:2|max:50',

            'email'            => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'          => 'Trường này không được để trống',
            'email.required'         => 'Trường này không được để trống',
            'name.min'               => 'Tên ít nhất 2 ký tự',
            'name.max'               => 'Tên nhiều nhất 50 ký tự'
        ];
    }
}
