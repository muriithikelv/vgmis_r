<?php

namespace App\Http\Requests\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

        if(isset($this->product)){
            return [
                'name'  => 'required|unique:product,name,'.$this->product.',product_id'
            ];
        }
        return [
            'name'=>'required',
            'description' =>'required',
            'price' =>'required',
            'delivery_cost' =>'required',
        ];

    }
}
