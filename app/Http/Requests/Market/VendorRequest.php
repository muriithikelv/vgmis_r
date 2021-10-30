<?php

namespace App\Http\Requests\Market;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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

        if(isset($this->vendor_id)){
            return [
                'name'  => 'required|unique:vendor,name,'.$this->vendor_id.',vendor_id',

            ];
        }
        return [
            'name'=>'required|unique:vendor',

        ];

    }
}
