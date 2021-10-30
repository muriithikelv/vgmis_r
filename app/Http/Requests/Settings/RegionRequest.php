<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class RegionRequest extends FormRequest
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

        if(isset($this->region)){
            return [
                'region_name'  => 'required',
                'location_id' => 'required'
            ];
        }
        return [
            'region_name'=>'required',
            'location_id' => 'required'
        ];

    }
}
