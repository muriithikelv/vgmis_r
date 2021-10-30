<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class SubCountyRequest extends FormRequest
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
        if(isset($this->sub_county)){
            return [
                'sub_county_name'  => 'required|unique:SubCounty,sub_county_name,'.$this->sub_county.',sub_county_id',
                'county_id' => 'required'
            ];
        }
        return [
            'sub_county_name'=>'required|unique:sub_county',
            'county_id' => 'required'
        ];
    }
}
