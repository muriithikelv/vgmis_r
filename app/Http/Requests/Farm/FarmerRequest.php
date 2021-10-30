<?php

namespace App\Http\Requests\Farm;

use Illuminate\Foundation\Http\FormRequest;

class FarmerRequest extends FormRequest
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

        if(isset($this->farmer)){
            return [
                'farmer_name'  => 'required|unique:farmer,farmer_name,'.$this->farmer.',farmer_id'
            ];
        }
        return [
            'farmer_name'=>'required|unique:farmer',
        ];

    }
}
