<?php

namespace App\Http\Requests;

use App\Models\User;
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
        $user = auth()->user()->hasRole('admin')
            ? User::find($this->user_id)
            : auth()->user();

        $this->merge([
            'user_id' => $user->id,
            'dollar_price' => $user->dollar_price,
            'commission' => $user->commission,
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
            'usd_nio' => 'required',
            'is_sent' => 'nullable|boolean',
            'is_paid' => 'nullable|boolean',
        ];
    }
}
