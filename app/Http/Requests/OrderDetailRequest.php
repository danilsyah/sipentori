<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderDetailRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'orders_id'     => 'required|exists:orders,id',
            'items_id'      => 'required|exists:items,id',
            'serial_number' => 'required|max:255|unique:order_details,serial_number',
            'qty'           => 'required|min:1',
            'is_warehouse'  => 'required|boolean',
            'condition'     => 'required'
        ];
    }
}