<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UsersVacationsStoreRequest extends FormRequest
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
            'to' => 'required|date|date_format:Y-m-d',
            'from' =>  'required|date|date_format:Y-m-d',
        ];
    }
}
