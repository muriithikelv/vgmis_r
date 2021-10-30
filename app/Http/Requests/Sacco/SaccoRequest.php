<?php

namespace App\Http\Requests\Sacco;

use Illuminate\Foundation\Http\FormRequest;

class SaccoRequest extends FormRequest
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

        if(isset($this->sacco)){
            return [
                'sacco_name'  => 'required',
            ];
        }
        return [
            'sacco_name'=>'required|unique:sacco',
            'description' => 'required',
        ];

    }
}
