<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UsersSkillsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     *
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
            'skills' => 'required|array',
            'skills.*' => 'integer|exists:skills,id'
        ];
    }

    /**
     * Get custom messages based on the validation rule.
     *
     * @return array
     */
    public function messages(){

        return [
            'skills.required' => 'Pass an array with skills id!',
        ];
    }
}
