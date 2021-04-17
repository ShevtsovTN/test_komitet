<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCreateRequest extends FormRequest
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
            'text' => 'required|string',
            'price' => 'required|numeric|min:0',
            'amount' => 'required|numeric|integer|min:1',
            'banner' => 'required|file|image',
        ];
    }

    /**
     * Validation error responses
     *
     * @return string[]
     */
    public function messages()
    {
        return [
            'text.required' => 'The text field is required',
            'text.string' => 'The text field should be a string',
            'price.required' => 'The price field is required',
            'price.numeric' => 'The price field should be a numeric',
            'price.min' => 'The minimum ad cost must be a non-negative number',
            'amount.required' => 'The amount field is required',
            'amount.numeric' => 'The amount field should be a numeric',
            'amount.integer' => 'The amount field should be a integer',
            'amount.min' => 'The amount field must be greater than zero',
            'banner.required' => 'The banner field is required',
            'banner.file' => 'The banner field should be a file',
            'banner.image' => 'The banner field should be a image',
        ];
    }
}
