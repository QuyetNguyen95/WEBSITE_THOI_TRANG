<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPassword extends FormRequest
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
            'old_password'         => 'required|min:6|max:12',
            'new_password'         => 'required|min:6|max:12',
            'confirm_password' => 'required|min:6|max:12|same:new_password',
        ];
    }
    public function messages()
    {
        return [
            'old_password.required'      => 'Trường này không được để trống',
            'old_password.min'           => 'Tên ít nhất 6 ký tự',
            'old_password.max'           => 'Tên nhiều nhất 12 ký tự',

            'new_password.required'      => 'Trường này không được để trống',
            'new_password.min'           => 'Tên ít nhất 6 ký tự',
            'new_password.max'           => 'Tên nhiều nhất 12 ký tự',

            'confirm_password.min'       => 'Tên ít nhất 6 ký tự',
            'confirm_password.max'       => 'Tên nhiều nhất 12 ký tự',
            'confirm_password.same'      => 'Mật khẩu không khớp',
            'confirm_password.required'  => 'Trường này không được để trống'
        ];
    }
}
