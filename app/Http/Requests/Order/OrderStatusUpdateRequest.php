<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderStatusUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => 'required|string'
        ];
    }
}
