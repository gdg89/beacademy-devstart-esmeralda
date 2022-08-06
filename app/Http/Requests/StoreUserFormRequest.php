<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'password' => [
                'required',
                'min:6',
                'max:30'
            ],
            'avatar' => [
                'required',
                'file',
                'mimes:jpg,png'
            ],
            'cpf' => [
                'required',
                'string',
                'min:11',
                'max:14',
                'unique:users,cpf,{$id},id',
            ],
            'cep' => [
                'required',
                'string',
                'size:9',
            ],
            'phone' => 'required|string|min:11',
            'state' => 'required|string',
            'street' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'number' => 'required|integer',
            'complement' => 'nullable|string',
            'birthday' => 'required'
        ];

        if ($this->method('PUT')) {
            $rules['email'] = [
                'required',
                'email',
                Rule::unique('users')->ignore($this->id)
            ];

            $rules['avatar'] = [
                'nullable',
                'file',
                'mimes:jpg,png'
            ];

            $rules['cpf'] = [
                'required',
                'string',
                'min:11',
                'max:11',
                Rule::unique('users')->ignore($this->id)
            ];

            $rules['password'] = [
                'nullable',
                'string',
                'min:6',
                'max:30'
            ];
        }

        return $rules;
    }
}
