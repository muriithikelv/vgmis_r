<?php

namespace App\Http\Requests\Farm;

use Illuminate\Foundation\Http\FormRequest;

class VetRequest extends FormRequest
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

        if(isset($this->vet)){
            return [
                'vet_name'  => 'required|unique:vet,vet_name,'.$this->vet.',vet_id'
            ];
        }
        return [
            'vet_name'=>'required|unique:vet',
        ];

    }
}
