<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertCategoryRequest extends FormRequest
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
            'name' => 'required|max:50',
            'index' => 'max:50',
            'categoryDescription' => 'max:1000',
            'parentCategory' => 'numeric',
            'layotType' =>  'max:50',
            'image' => 'mimes:jpg,png,gif',

        ];
    }
}
