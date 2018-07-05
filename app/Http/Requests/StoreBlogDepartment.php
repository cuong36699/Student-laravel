<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogDepartment extends FormRequest
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
            'department_name' => 'required|max:100|min:1|unique:departments',
        ];
    }
    public function messages()
    {

        if (config('app.locale') == 'vi') {
            return [
                'department_name.required' => 'Vui lòng chọn Tên khoa',
                'department_name.min' => 'Tên khoa không được dưới 1 ký tự',
                'department_name.max' => 'Tên khoa không được quá 100 ký tự',
                'department_name.unique' => 'Dữ liệu khoa đã tồn tại',
            ];
        } else {
            return [ ];
        }

    }
}
