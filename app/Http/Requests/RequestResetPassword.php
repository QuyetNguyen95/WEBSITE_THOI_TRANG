<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestResetPassword extends FormRequest
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
            'password'         => 'required|min:6|max:12',
            'password_confirm' => 'required|min:6|max:12|same:password',
        ];
    }
    public function messages()
    {
        return [
            'password.required'      => 'Trường này không được để trống',
            'password.min'           => 'Tên ít nhất 6 ký tự',
            'password.max'           => 'Tên nhiều nhất 12 ký tự',

            'password_confirm.min'       => 'Tên ít nhất 6 ký tự',
            'password_confirm.max'       => 'Tên nhiều nhất 12 ký tự',
            'password_confirm.same'      => 'Mật khẩu không khớp',
            'password_confirm.required'  => 'Trường này không được để trống'
        ];
    }
}
