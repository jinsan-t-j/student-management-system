<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class TeacherUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50', 'unique:teachers,name,' . $this->id],
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */

    public function messages() {
        return [
            'name.required' => ':attribute is required',
            'name.string' => ':attribute must be a string',
            'name.max' => ':attribute must be a less than 50 characters',
            'name.unique' => ':attribute already exist',
        ];
    }

    /**
     * Get the validation rule that apply to the request.
     *
     * @return array
     */

    public function attributes() {
        return [
            'name' => 'Name',
        ];
    }
}