<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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

        $rules = [
            'username' => 'required|max:255',
            'email' => 'email|required|unique:users|max:255',
            'password' => 'required|max:255',
            'avatar' => 'nullable',
            'description' => 'nullable',
            'leader_id' => 'nullable',
            //
        ];

        return $rules;
    }

    public function attributes()
    {
        return [
            'username' => 'The field "username"',
            'email' => 'The field "email"',
            'password' => 'The field "password"',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required!',
            'email' => ':attribute must be an email address!',
            'max' => ':attribute must be shorter than 255 characters!',
            'unique' => ':attribute must be unique!',
        ];
    }
}
