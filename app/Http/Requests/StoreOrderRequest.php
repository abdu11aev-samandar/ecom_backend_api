<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            /*'comment' => 'nullable|string',
            'delivery_method_id' => 'required|integer|exists:delivery_methods,id',
            'payment_type_id' => 'required|integer|exists:payment_types,id',
            'sum' => 'required|integer',
            'products' => 'required|array',
            'products.*.id' => 'required|integer|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'address' => 'required|string',*/

            'delivery_method_id' => 'required|numeric',
            'payment_type_id' => 'required|numeric',
            'products' => 'required',
            'products.*.product_id' => 'required|numeric',
            'products.*.quantity' => 'required|numeric',
            'products.*.stock_id' => 'nullable|numeric',
            'comment' => 'nullable|max:500'
        ];
    }
}
