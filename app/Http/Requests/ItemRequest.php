<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ItemRequest extends FormRequest
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
        $validations = [
            'categories_id' => 'required|max:255|integer|exists:categories,id',
            // 'item_no'       => ['required', Rule::unique('items','item_no')->ignore($this->route('item'))],
            'item_no'       => 'required',
            'description'   => 'required|max:255|string',
            'stok_min'      => 'required|min:0|integer',
            'unit'          => 'required|max:255',
            'price'         => 'required|min:0|integer'
        ];
        return $validations;
    }
}
