<?php

namespace App\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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

        if(isset($this->subscription)){
            return [
                'transaction_code'  => 'required|unique:subscription,transaction_code,'.$this->subscription.',subscription_id',
                'start_date' => 'required',
                'end_date' => 'required'
            ];
        }
        return [
            'transaction_code'=>'required|unique:subscription',
            'start_date' => 'required',
            'end_date' => 'required'
        ];

    }
}
