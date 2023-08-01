<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertProductRequest extends FormRequest
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
            'name' => 'required|max:100',
            'index' => 'max:100',
            'barcode' => 'max:20',
            'unit' => 'max:20',
            'price' => 'numeric|',
            'currency' => 'max:5',
            'vat_rate' => 'max:10',
            'description' => 'max:1000',
            'descriptionBis' => 'max:1000',
            'priority' => 'max:10',
            'category_id' => 'numeric|',
        ];
    }
}
