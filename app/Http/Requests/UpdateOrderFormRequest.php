<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderFormRequest extends FormRequest
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

    public function messages()
    {
        return [
            'products.required' => 'Pelo menos 1 produto é obrigatório.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $statusList = implode(',', Order::getStatusList());

        $rules = [
            'status' => 'required|in:' . $statusList,
        ];

        $order = $this->route('order');
        $uniqueProducts = Order::getUniqueProducts($order);

        // get product ids from uniqueProducts Collection
        $productIds = $uniqueProducts->pluck('id')->toArray();

        $requestKeys = array_keys($this->request->all());

        $validate = array_intersect($requestKeys, $productIds);

        // check if size o validate is equal to size of productIds
        if (count($validate) === count($productIds)) {
            $rules['products'] = 'required';
        }

        return $rules;
    }
}
