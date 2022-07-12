<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreUsersFormRequest extends FormRequest
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
        $id = $this->id ?? '';
        $rules = [
            'name'=> 'required|string|max:50|min:3', 
            'email'=>[
                'required',
                'email',
                'unique:users,email,{$id},id',
            ],
            'phone'=>'required|string|min:11',
            'address'=>'required|string',
            'birthday'=>'required',
            'cpf'=>'required|string|min:11',
            'password'=>[
                'required',
                'min:4',
                'max:15'
            ]
        ];
        if($this->method('PUT')){
            $rules = [
                'name'=> 'nullable|string|max:50|min:3', 
                'email'=>[
                    'nullable',
                    'email',
                    
                ],
                'phone'=>'nullable|string|min:11',
                'address'=>'nullable|string',
                'birthday'=>'nullable',
                'cpf'=>'nullable|string|min:11',
                'password'=>[
                    'nullable',
                    'min:4',
                    'max:15'
                ]
            ];
        };
        return $rules;
    }
}