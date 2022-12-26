<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdate extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'player_id' => 'required|integer',
            'player_name' => 'nullable',
            'amount' => 'nullable|integer',
            'is_sent' => 'nullable|boolean',
            'is_paid' => 'nullable|boolean',
        ];
    }
}
