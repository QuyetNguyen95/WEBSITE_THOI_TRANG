<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
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
           'name' => 'required|unique:categories,c_name,'.$this->id,
            //  unique:table,column,except,idColumn
            // table: refers to the table name "users"
            // column: refers the column name "email"
            // except: I'm taking it as the id of the Model instance I want to exclude from the "unique" verification
            'icon' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'name.unique'   => 'Tên danh mục đã tồn tại',
            'name.required' => 'Trường này không được để trống',
            'icon.required' => 'Trường này không được để trống'
        ];
    }
}
