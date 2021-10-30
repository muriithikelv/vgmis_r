<?php

namespace App\Http\Requests\Farm;

use Illuminate\Foundation\Http\FormRequest;

class HarvestRequest extends FormRequest
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

        if(isset($this->harvest)){
            return [
                'harvest_name'  => 'required|unique:harvest,harvest_name,'.$this->harvest.',harvest_id'
            ];
        }
        return [
            'harvest_name'=>'required',
        ];

    }
}
