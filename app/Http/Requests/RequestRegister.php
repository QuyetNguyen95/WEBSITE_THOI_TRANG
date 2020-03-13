<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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

            'phone'            => 'required|numeric',

            'email'            => 'required|email|unique:users',

            'password'         => 'required|min:6|max:12',

            'confirm_password' => 'required|min:6|max:12|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required'          => 'Trường này không được để trống',
            'email.required'         => 'Trường này không được để trống',
            'phone.required'         => 'Trường này không được để trống',
            'password.required'      => 'Trường này không được để trống',
            'name.min'               => 'Tên ít nhất 2 ký tự',
            'name.max'               => 'Tên nhiều nhất 50 ký tự',
            'phone.numeric'          => 'Số điện thoại phải là số',
            'email.unique'           => 'Email đã tồn tại',
            'password.min'           => 'Tên ít nhất 6 ký tự',
            'password.max'           => 'Tên nhiều nhất 12 ký tự',
            'confirm_password.min'           => 'Tên ít nhất 6 ký tự',
            'confirm_password.max'           => 'Tên nhiều nhất 12 ký tự',
            'confirm_password.same'  => 'Mật khẩu không khớp',
            'confirm_password.required'  => 'Trường này không được để trống'
        ];
    }
}
