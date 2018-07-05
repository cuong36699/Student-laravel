<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogCourse extends FormRequest
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
            'course_name' => 'required|unique:courses',
        ];
    }
    public function messages()
    {

        if (config('app.locale') == 'vi') {
            return [
                'course_name.unique' => 'Tên lớp đã tồn tại',
            ];
        } else {
            return [ ];
        }

    }
}
