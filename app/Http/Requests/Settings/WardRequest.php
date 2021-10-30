<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class WardRequest extends FormRequest
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
        if(isset($this->ward)){
            return [
                'ward_name'  => 'required|unique:Ward,ward_name,'.$this->ward.',ward_id',
                'sub_county_id' =>'required'
            ];
        }
        return [
            'ward_name'=>'required|unique:ward',
            'sub_county_id' => 'required'
        ];
    }
}
