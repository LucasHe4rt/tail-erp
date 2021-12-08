<?php

namespace App\Http\Requests\Sales;

use Urameshibr\Requests\FormRequest;

class SaleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_name' => 'required|string',
            'client_cpf' => 'string',
            'total' => 'numeric',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|numeric',
            'items.*.total' => 'required|numeric'
        ];
    }
}
