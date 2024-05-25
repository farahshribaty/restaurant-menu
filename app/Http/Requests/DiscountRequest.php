<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'discountable_type' => 'required|string',
            'discountable_id' => 'required|integer',
            'percentage' => 'required|numeric|min:0|max:100'
        ];
    }
}
