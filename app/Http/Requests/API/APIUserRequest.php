<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\FormRequest;


class APIUserRequest extends FormRequest
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
        if(isset($this->user_id)){
            return [
                'sacco_id' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|unique:user',
                'phone_no' => 'required|unique:user',
                'id_no' => 'required|unique:user',
                'password' => 'required'
            ];
        }

        return [
            'sacco_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:user',
            'phone_no' => 'required|unique:user',
            'id_no' => 'required|unique:user',
            'password' => 'required'
        ];
    }
}
