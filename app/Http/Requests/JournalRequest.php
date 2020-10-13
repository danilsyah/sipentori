<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JournalRequest extends FormRequest
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
            'code'          => 'required|max:255', // auto generate, format : BK-bulan_tahun_no urut (BK1020-001)
            'request_name'  => 'required|max:100',
            'issue_name'    => 'required|max:100',
            // 'status'    => 'required'
        ];
    }
}
