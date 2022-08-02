<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderTicketFormRquest extends FormRequest
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
            "transaction_type" => "required|in:ticket",
            "transaction_amount" => "required|numeric",
            "transaction_installments" => "required|integer|min:1|max:12",
            "customer_name" => "required|string|min:3|max:255",
            "customer_document" => "required|string|min:11|max:14",
            "customer_postcode" => "required|string|size:9",
            "customer_address_street" => "required|string|min:3|max:255",
            "customer_andress_number" => "required|integer|min:0",
            "customer_address_neighborhood" => "required|string|min:3|max:255",
            "customer_address_city" => "required|string|min:3|max:255",
            "customer_address_state" => "required|string|min:3|max:255",
            "customer_address_country" => "required|string|min:3|max:255",
        ];
    }
}
