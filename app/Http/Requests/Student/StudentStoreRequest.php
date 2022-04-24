<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
            'name' => 'required | string | max:50 | unique:students,name',
            'age' => 'required | numeric | min:1 | max:100',
            'gender' => 'required',
            'teacher_id' => 'required | exists:teachers,id',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => ':attribute is required',
            'name.string' => ':attribute must be a string',
            'name.max' => ':attribute must be a less than 50 characters',
            'name.unique' => ':attribute already exist',
            'age.required' => ':attribute is required',
            'age.numeric' => ':attribute must be a number',
            'teacher_id.required' => ':attribute is required',
            'teacher_id.exists' => ':attribute does not exist',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Name',
            'age' => 'Age',
            'gender' => 'Gender',
            'teacher_id' => 'Teacher',
        ];
    }
}
