<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'locations_id'  => 'required|exists:locations,id',
            'code'          => 'required|max:10|unique:orders,code', //kode berdasarkan no transfer order / no order dari supplier , di isi manual
            'note'          => 'required|max:100',
            'attachment'    => 'max:1024',
            // 'status'    => 'required'
        ];
    }
}
