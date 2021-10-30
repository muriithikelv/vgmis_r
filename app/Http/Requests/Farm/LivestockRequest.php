<?php

namespace App\Http\Requests\Farm;

use Illuminate\Foundation\Http\FormRequest;

class LivestockRequest extends FormRequest
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

        if (isset($this->livestock)) {
            return [
                'livestock_name'  => 'required|unique:livestock,livestock_name,' . $this->livestock . ',livestock_id'
            ];
        }
        return [
            'livestock_name' => 'required',
            'number' => 'required',
            'age' => 'required',
            'gender' =>'required',
        ];
    }
}
