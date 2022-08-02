<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderCardFormRequest extends FormRequest
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
            "products" => "required|array",
            "transaction_type" => "required|in:card",
            "transaction_amount" => "required|numeric",
            "transaction_installments" => "required|integer|min:1|max:12",
            "customer_name" => "required|string|min:3|max:255",
            "customer_document" => "required|string|min:11|max:14",
            "customer_card_number" => "required|string|min:16|max:19",
            "customer_card_cvv" => "required|string|size:3",
            "customer_card_expiration_date" => "required|string|size:7",
        ];
    }
}
