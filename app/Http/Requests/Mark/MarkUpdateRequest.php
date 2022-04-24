<?php

namespace App\Http\Requests\Mark;

use Illuminate\Foundation\Http\FormRequest;

class MarkUpdateRequest extends FormRequest
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
            'student_id' => 'required | exists:students,id',
            'maths' => 'nullable | numeric',
            'science' => 'nullable | numeric',
            'history' => 'nullable | numeric',
            'term' => 'required'
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
            'student_id.required' => ':attribute is required',
            'student_id.exists' => ':attribute does not exist',
            'maths.numeric' => ':attribute must be a number',
            'science.numeric' => ':attribute must be a number',
            'history.numeric' => ':attribute must be a number',
            'term.required' => ':attribute is required',
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
            'student_id' => 'Student',
            'maths' => 'Maths',
            'science' => 'Science',
            'history' => 'History',
            'term' => 'Term'
        ];
    }
}
