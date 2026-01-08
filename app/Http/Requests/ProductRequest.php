<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The product name is required.',
            'price.required' => 'The product price is required.',
            'price.numeric' => 'The product price must be a number.',
            'price.min' => 'The product price must be at least 0.',
        ];
    }
}
