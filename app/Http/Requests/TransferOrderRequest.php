<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferOrderRequest extends FormRequest
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
						'code' => 'required|unique:transfer_orders,code',
						'locations_id' => 'required|exists:locations,id',
						'note'	=> 'required|max:255',
						'status' => 'required|boolean'
        ];
    }
}
