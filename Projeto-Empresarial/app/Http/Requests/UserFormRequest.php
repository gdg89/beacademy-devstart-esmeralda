<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name' => 'required|string|min:4|max:200',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:6',
            'cpf' => 'required|numeric|min:11|unique:users,cpf',
            'birthday' => 'required',
            'phone' => 'required|numeric|min:11',
            'street' => 'required|string|min:3',
            'neighbor' => 'required|string|min:4',
            'number' => 'required|numeric',
            'city' => 'required|string|min:3',
            'state' => 'required|string',
            'complement' => 'nullable|string|max:40'
        ];
    }
}
