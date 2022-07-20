<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserFormRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'email' => [
                'required',
                'email',
                'unique:users,email,{$id},id',
            ],
            'cpf' => [
                'required',
                'string',
                'min:11',
                'max:11',
                'unique:users,cpf,{$id},id',
            ],
            'phone' => 'required|string|min:11',
            'state' => 'required|string',
            'street' => 'required|string',
            'city' => 'required|string',
            'neighbor' => 'required|string',
            'number' => 'required|string',
            'complement' => 'required|string',
            'birthday' => 'required',
            'password' => [
                'required',
                'min:4',
            ]
        ];

        return $rules;
    }
}
