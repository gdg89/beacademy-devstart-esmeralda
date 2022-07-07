<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductFormRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:100',
            'price_cost' => 'required|numeric',
            'price_sell' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'required|string|min:4',
            'cover' => [
                'required',
                'file',
                'mimes:jpg,png'
            ],
        ];

        return $rules;
    }
}
