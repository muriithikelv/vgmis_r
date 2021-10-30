<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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

        if(isset($this->location)){
            return [
                'county_id' => 'required',
                'location_name'  => 'required'
            ];
        }
        return [
            'county_id' => 'required',
            'location_name'=>'required|unique:location',
        ];

    }
}
