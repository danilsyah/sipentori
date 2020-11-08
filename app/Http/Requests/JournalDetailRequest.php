<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JournalDetailRequest extends FormRequest
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
            'journals_id'   => 'required|exists:journals,id',
            'items_id'      => 'required|exists:items,id',
            'serial_number' => 'nullable|exists:order_details,serial_number',
            'qty'           => 'required|integer',
            'note'          => 'required|string|max:255'
        ];
    }
}
