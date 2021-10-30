<?php

namespace App\Http\Requests\Sacco;

use Illuminate\Foundation\Http\FormRequest;

class SaccoMemberRequest extends FormRequest
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
        if(isset($this->sacco_member)){
            return [
                'member_name'  => 'required'
            ];
        }
        return [
            'member_number'=>'required|unique:sacco_members',
            'member_id_no' => 'required|unique:sacco_members',

        ];
    }
}
