<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class CountyRequest extends FormRequest
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

        if(isset($this->county)){
            return [
                'county_name'  => 'required|unique:County,county_name,'.$this->county.',county_id'
            ];
        }
        return [
            'county_name'=>'required|unique:county',
        ];

    }
}
