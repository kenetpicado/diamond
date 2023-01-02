<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStore extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id,
            'dollar_price' => auth()->user()->dollar_price,
            'commission' => auth()->user()->commission,
            'usd_nio' => config('usd.nio')
        ]);
    }   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'player_id' => 'required|integer',
            'player_name' => 'nullable',
            'amount' => 'required|integer',
            'dollar_price' => 'required',
            'commission' => 'required',
            'user_id' => 'required',
            'usd_nio' => 'required'
        ];
    }
}
