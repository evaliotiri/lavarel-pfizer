<?php

namespace App\Http\Requests\User\Department;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentsUsersStoreRequest extends FormRequest
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
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ];
    }

    /**
     * Get custom messages based on the validation rule.
     *
     * @return array
     */
    public function messages(){

        return [
            'email.unique' => 'Must be unique for each user',
        ];
    }
}
