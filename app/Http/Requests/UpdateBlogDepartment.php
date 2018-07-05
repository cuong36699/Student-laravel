<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogDepartment extends FormRequest
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
            'department_name' => 'required|max:150|min:1|unique:departments,department_name,' . $this->department,
            'degree' => 'required|max:150|min:1',
            'graduation_year' => 'required|numeric|min:1',
        ];
    }
    public function messages()
    {

        if (config('app.locale') == 'vi') {
            return [
                // 
                'department_name.required' => 'Vui lòng chọn Tên khoa',
                'department_name.min' => 'Tên khoa không được dưới 1 ký tự',
                'department_name.max' => 'Tên khoa không được quá 150 ký tự',
                'department_name.unique' => 'khoa đã tồn tại',
                // 
                'degree.required' => 'Vui lòng chọn Bậc học',
                'degree.min' => 'Bậc học không được dưới 1 ký tự',
                'degree.max' => 'Bậc học không được quá 150 ký tự',
                // 
                'graduation_year.required' => 'Vui lòng chọn Năm học',
                'graduation_year.min' => 'Năm học không được dưới 1 ký tự',
                'graduation_year.numeric' => 'Năm học phải là số',
            ];
        } else {
            return [ ];
        }

    }
}
