<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'product' => [
                'required',
                'string'
            ],
            'cost' => [
                'required',
                'numeric',
                'between:0,9999999999.99'             
            ],
            'date' => [
                'required',
                'date'
            ],
            'phone' => [
                'required',
                'string'
            ],
        ];
    }
}
