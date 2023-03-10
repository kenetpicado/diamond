<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'password' => bcrypt('password')
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
            'name' => 'required|max:50|unique:users,email',
            'email' => 'required:max:50',
            'dollar_price' => 'required|numeric',
            'commission' => 'required|numeric',
            'roles' => 'required|array',
            'password' => 'required'
        ];
    }
}
