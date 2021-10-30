<?php

namespace App\Http\Requests\Market;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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

        if(isset($this->category)){
            return [
                'category_name'  => 'required|unique:category,category_name,'.$this->category.',category_id'
            ];
        }
        return [
            'category_name'=>'required|unique:category',
            'description' => 'required',
        ];

    }
}
